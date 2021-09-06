<?php?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}">
</head>
<body>
<form action="search" type="get">
    <input type="text" name="name">
    <input type="submit" value="Search">
</form>
<div class="login">
    <h2>Đăng Kí Tiêm Vaccin Covid</h2>
    <form action="Commit" method="post" >
        @csrf
    <input type="text" name="CMND" placeholder="Số CMND">
    <input type="text" name="hovaten" placeholder="Họ Và Tên">
    <input type="date" name="ngaythangnamsinh" placeholder="Ngày Tháng Năm Sinh">
    <input type="text" name="diachi" placeholder="Địa Chỉ">
    <input type="text" name="sdt" placeholder="Số Điện Thoại">
    <input type="text" name="tiensudiung" placeholder="Tiền sử dị ứng">
    <button type="submit">Đăng Kí</button>
    </form>
    <br></br>
    <table border="1">
        <tr>
            <td>Id</td>
            <td>CMND</td>
            <td>Họ Và Tên</td>
            <td>Ngày Tháng Năm Sinh</td>
            <td>Địa Chỉ</td>
            <td>Sdt</td>
            <td>Tiền sử</td>
        </tr>
        @foreach($list as $lists)
        <tr>
            <td>{{$lists['id']}}</td>
            <td>{{$lists['CMND']}}</td>
            <td>{{$lists['hovaten']}}</td>
            <td>{{$lists['ngaythangnamsinh']}}</td>
            <td>{{$lists['diachi']}}</td>
            <td>{{$lists['sdt']}}</td>
            <td>{{$lists['tiensudiung']}}</td>

        </tr>
        @endforeach
    </table>
</div>

</body>

</html>
