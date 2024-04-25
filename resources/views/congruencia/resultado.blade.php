@extends('layout.index')

@section('contenido')
    
<!DOCTYPE html>
<html>
<head>
    <title>Congruencia Fundamental</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Resultado de la Secuencia Generada</div>

                    <div class="card-body">
                        <ul>
                            @foreach ($secuencia as $elemento)
                                <li>{{ $elemento }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
@endsection
