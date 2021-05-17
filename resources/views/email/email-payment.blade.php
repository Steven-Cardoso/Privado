
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <main class="py-4">
        @yield('content')
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3>Factura de O Farol "Pool Bar"</h3>
                    <h3>Nome do Cliente:</h3>
                        <?=$nome?>
                    <h3>Itens Consumidos:</h3>
                        <?=$data?>
                    <h3>Valor total pago:</h3>
                        <?=$amount?> Mzn
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </main>
</body>
</html>
 