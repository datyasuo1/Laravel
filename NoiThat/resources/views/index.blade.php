<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh mục kho hàng</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="front/css/style.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="top_1">
            <div class="row">
                <div class="col" style="text-align: center" >
                    <h2>DANH MỤC HÀNG HOÁ</h2>
                </div>
            </div>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            <div class="row">
                <table class="table table-bordered">
                    <tr>
                        <th class="ct">ID</th>
                        <th class="ct">Name</th>
                        <th class="ct">Price</th>
                        <th class="ct">Image</th>
                    </tr>
                    @foreach($warehouse as $wh)
                        <tr>
                            <td>{{$wh->id_name}}</td>
                            <td>{{$wh->name}}</td>
                            <td style="text-align: right">{{$wh->price}} VNĐ</td>
                            <td><img src="front/img/{{ $wh->image }}" alt="" width="120" style="margin-left: 25px"></td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
        <div class="top_2">
            <div class="row">
                <div class="col" >
                    <h2 style="margin-top: 20px; text-align: center">THÊM HÀNG HOÁ</h2>
                </div>
            </div>
            <form action="{{ route('store') }}" method="post" style="margin-top: 25px; margin-right: 150px; margin-left: 100px">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Mã hàng hoá:</label><br/>
                    <input type="text" maxlength="15" required="required" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên hàng hoá:</label><br/>
                    <input type="text"  required="required" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Giá:</label><br/>
                    <input type="text" maxlength="15" required="required" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Ảnh sản phẩm:</label><br/>
                    <input type="file" required="required" name="image">
                </div>
                <button  class="btn btn-success" style="width: 100px; height:40px; margin-top: 20px; margin-bottom: 15px">Thêm</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
</body>
</html>
