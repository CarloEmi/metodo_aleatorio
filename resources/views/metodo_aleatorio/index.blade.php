@extends('layout.index')

@section('contenido')
    
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Método Von Neumann</h5>
              <p class="card-text">Método para generar números pseudoaleatorios Von Neumann</p>
                <div class="text-end">
                    <a href="{{ route('neumann.index') }}" class="btn btn-primary">Ver</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Método Congruencia Fundamental</h5>
              <p class="card-text">Método para generar números pseudoaleatorios Congruencia Fundamental</p>
                <div class="text-end">
                    <a href="{{ route('congruencia.index') }}" class="btn btn-primary">Ver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection