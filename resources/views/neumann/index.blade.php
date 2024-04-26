@extends('layout.index')

@section('contenido')

<div class="row">
    <div class="col">
        <h3>Método de Von Neumann</h3>
    </div>
</div>
<div class="row">   
    <div class="col">
        <form action="{{  route("neumann.VonNeumann")  }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <!-- Semilla -->
                <div class="form-group mb-3">
                    <label class="col-form-label">Ingrese el valor de la semilla </label>
                    <input type="number" class="form-control" name="semilla" required autofocus>
                    @error('semilla')
                        <p class=" bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col">
                <!-- Valor n (cantidad) -->
                <div class="form-group mb-3">
                    <label class="col-form-label">Ingrese la cantidad de números </label>
                    <input type="number" class="form-control" name="cantidad" required autofocus>
                    @error('cantidad')
                        <p class=" bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}</p>
                    @enderror
                </div>
            </div>     
        </div>

        <div class="row">
            <div class="col d-flex align-items-end flex-column mb-3">
                <input type="submit" class="btn btn-primary" value="Generar números">
            </div>
        </div>
        
        </form>
    </div>
</div>

@endsection