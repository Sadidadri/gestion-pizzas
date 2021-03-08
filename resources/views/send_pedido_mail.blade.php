<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Registro de su pedido</title>
</head>
<body>
    <p>¡Muchas gracias por realizar su pedido con RollPizza!</p>
    <p>Has pedido:</p>
    <ul>
        @foreach ($contenidoPedido as $lineaPedido)
            <li>{{ $lineaPedido }}</li>
        @endforeach
    </ul>
    <p>Total: <b>{{$precio}}€</b></p>
</body>
</html>