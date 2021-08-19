<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Utilities\VNPay;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    public function index(){
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('front.checkout.index',compact('carts','total','subtotal'));
    }

    public function  addOrder(Request $request)
    {
        //1 Thêm đơn hàng
        $order = Order::create($request->all());

        //2 Thêm chi tiết đơn hàng
        $carts = Cart::content();

        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->price * $cart->qty,
            ];
            OrderDetail::create($data);
        }

        if ($request->payment_type == 'pay_later') {
            //gui mail
            $total = Cart::total();
            $subtotal = Cart::subtotal();

            $this->sendEmail($order,$total,$subtotal);

            //3 xóa giỏ hàng
            Cart::destroy();

            //4 Trả về kết quả
            return redirect('checkout/result')->with('notification','Success! Has paid online.Please check your email');

        }

        if ($request->payment_type == 'online_payment') {
            //1. lấy URL thanh toán VNPAY
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef'=> $order->id,//id don hang
                'vnp_OrderInfo'=>'Mo ta don hang',
                'vnp_Amount'=>Cart::total(0,'','')* 23075 ,//đổi từ đô sang việt
            ]);
            //2.Chuyển tới URL lấy được
            return redirect()->to($data_url);
        }
    }

    public function vnPayCheck(Request  $request){

        //1.lấy data từ URL (do VNPay gửi về $vnp_Returunl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');//Mã phản hồi kết quả tham gia thanh toán 00 = thành công
        $vnp_TxnRef = $request->get('vnp_TxnRef');//ticket_id
        $vnp_Amount = $request->get('vnp_Amount');//số tiền thanh toán

        //2. Kiem tra ket qua giao dich tra ve tu VNPay
        if($vnp_ResponseCode != null){
            //neu thanh cong
            if($vnp_ResponseCode == 00) {
                //gui email
                $order = Order::find($vnp_TxnRef);
                $total = Cart::total();
                $subtotal = Cart::subtotal();
                $this ->sendEmail($order,$total,$subtotal);

                //xoa gio hang
                Cart::destroy($order);
                //thong bao ket qua thanh cong
                return redirect('checkout/result')
                    ->with('notification','Success! Has paid online.Please check your email');

            } else{// neu ko thanh cong
                Order::find($vnp_TxnRef)->delete();
                //xoa ten don hang trong database, va tra ve thg tin bao loi
                return redirect('checkout/result')
                    ->with('notification','ERROR:Payment fail or canceled');
            }
        }
    }

    public function result(){
        $notification = session('notification');
        $notification = 'Info...';
        return view('front.checkout.result',compact('notification'));
    }

    public  function sendEmail($order,$total,$subtotal){
        $email_to = $order->email;

        Mail::send('front.checkout.email',compact('order','total','subtotal'),function ($message) use($email_to){
            $message->from('datyasuo202@gmail.com','datlop10@gmail.com');
            $message->to($email_to,$email_to);
            $message->subject('Order Notification');
        });
    }
}
