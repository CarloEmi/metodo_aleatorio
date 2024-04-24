@extends('layout.index')

@section('contenido')
    <!-- resources/views/congruencia/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Congruencia Fundamental</title>
</head>
<body>
    <h2>Generar Secuencia - Congruencia Fundamental</h2>
    <form method="POST" action="{{ route('congruencia.generar') }}">
        @csrf
        <label for="a">Valor de 'a':</label>
        <input type="number" name="a" required><br>

        <label for="c">Valor de 'c':</label>
        <input type="number" name="c" required><br>

        <label for="k">Valor de 'k':</label>
        <input type="number" name="k" required><br>

        <label for="m">Valor de 'm':</label>
        <input type="number" name="m" required><br>

        <label for="cantidad">Cantidad de elementos:</label>
        <input type="number" name="cantidad" required><br>

        <button type="submit">Generar Secuencia</button>
    </form>
</body>
</html>

@endsection