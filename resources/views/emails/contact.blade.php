<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Mensaje de  {{ config('app.name', 'Tienda en linea') }}</h1>
    <p><strong>Nombre: </strong>{{$contact_first_name}}</p> <br>
    <p><strong>Teléfono: </strong>{{$contact_phone}}</p> <br>
    <p><strong>Correo electrónico: </strong>{{$contact_email_address}}</p> <br>
    <p><strong>Asunto: </strong>{{$contact_subject}}</p> <br>
    <p><strong>Mensaje: </strong>{{$contact_message}}</p> <br>
</body>
</html>