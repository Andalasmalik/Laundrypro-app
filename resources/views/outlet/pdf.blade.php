<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        <Center>
            Data Outlet 
        </Center>
    </h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Tlp</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($tb_outlet as $o )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$o->nama}}</td>
            <td>{{$o->alamat}}</td>
            <td>{{$o->tlp}}</td>
            
        </tr>
        
        @endforeach
        </tbody>
    </table>
</body>
</html>