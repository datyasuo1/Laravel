<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function Commit(Request $request){
        $list = new Lists;
        $list->CMND=$request->CMND;
        $list->hovaten=$request->hovaten;
        $list->ngaythangnamsinh=$request->ngaythangnamsinh;
        $list->diachi=$request->diachi;
        $list->sdt=$request->sdt;
        $list->tiensudiung=$request->tiensudiung;
        $list->save();

        return redirect('/');


    }

    public  function  Search(Request $request){
        $search = $_GET['query'];
        $list = Lists::where('hovaten','LIKE', '%'.$search.'$')->get();

        return view('/',compact('list'));
    }
    public function  View(){
        $data =  Lists::all();
        return view('index',['list'=>$data]);
    }
}
