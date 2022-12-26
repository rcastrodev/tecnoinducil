<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, th, td{
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Solicitud de cotización desde el sitio web Hilos Libertad</h2>
    <div>
        <p><strong>Nombre:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        @isset($data['phone'])
            <p><strong>Teléfono:</strong> {{ $data['phone'] }}</p>
        @endisset
        @isset($data['company'])
            <p><strong>Empresa:</strong> {{ $data['company'] }}</p>
        @endisset
        @isset($data['message'])
            <p><strong>Mensaje:</strong> {{ $data['message'] }}</p>
        @endisset
    </div>
    @isset($data['variableproduct'])
        <table style="width: 100%; boder:none;">
            <thead style="vertical-align: initial;">
                <tr class="">
                    <td class="text-dark">Producto</td>
                    <td class="text-dark">Sección <br> mm²</td>
                    <td class="text-dark">Cantidad</td>
                    <td class="bg-white" style="width: 100px;">Cantidad</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['variableproduct'] as $vp)
                    <tr>
                        <td>{{ $vp['productname'] }}</td>
                        <td>{{ $vp['sectionmm'] }}</td>
                        <td>{{ $vp['quantity'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    @endisset

</body>
</html>