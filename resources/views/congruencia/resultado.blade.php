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
                        @php
                            // Dividir la secuencia en grupos de 10 elementos
                            $grupos = array_chunk($secuencia, 10);
                        @endphp

                        @foreach ($grupos as $grupo)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Elemento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grupos as $grupo)
                                        @foreach ($grupo as $index => $elemento)
                                            <tr>
                                                <th scope="row">{{ $loop->parent->index * 10 + $index + 1 }}</th>
                                                <td>{{ $elemento }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
