<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Furniture</title>
    <link href="front/css/index.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

<div class="form">
    <form method="post" action="{{route('store')}}">
        @csrf
        <h2 align="center">Luu Do Noi That</h2>

        <table cellspacing="3" cellpadding="12" align="center" bgcolor="#add8e6">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price"></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <td><button type="submit">Save</button></td>
            </tr>
        </table>
    </form>
</div>

@foreach($datas as $data)
<div align="center" class="img">
    <div class="card" style="width: 45rem;" border="1px" >
        <img src="front/image/{{$data->image}}" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Product:{{$data->name}}</p>
            <p>Price:{{$data->price}}d</p>
        </div>
    </div>
</div>
@endforeach
</body>
</html>
