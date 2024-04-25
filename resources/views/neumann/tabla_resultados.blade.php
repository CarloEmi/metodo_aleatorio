@extends('layout.index')

@section('contenido')
    
<div class="row mb-4">
    <div class="col text-center">
        <h3>Números generados</h3>
    </div>
</div>

<div class="row">
    <div class="col mb-3">
        <h4>Semilla:</h4>
    </div>
    <div class="col">
        <input type="readonly" value="{{ $semilla }}" class="form-control">
    </div>
    <div class="col mb-3">
        <h4>Cantidad: </h4>
    </div>
    <div class="col">
        <input type="readonly" value="{{ $cantidad }}" class="form-control">
    </div>
</div>

<div class="row">
    <div class="col">
        <p><code>[
            @foreach ($resultados as $resultado)
                {{ $resultado }}
            @endforeach
        ]</code>
        </p>
    </div>
</div>

@endsection