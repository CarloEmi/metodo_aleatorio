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
        <input type="text" value="{{ $semilla }}" class="form-control" readonly>
    </div>
    <div class="col mb-3">
        <h4>Cantidad: </h4>
    </div>
    <div class="col">
        <input type="text" value="{{ $cantidad }}" class="form-control" readonly>
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

<div class="accordion accordion-flush my-4" id="accordionChiCuadrado">
    <div class="accordion-item">
      <h4 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            <h4 class="h4">Resultado de Test Chi Cuadrado: 
                @if ($test->get('resultado'))
                    <span class="badge text-bg-success">APROBADO</span>
                @else
                    <span class="badge text-bg-danger">DESAPROBADO</span>
                @endif
            </h4>
        </button>
      </h4>
      <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionChiCuadrado">
        <div class="accordion-body">

            <div class="row my-4">
                <div class="col">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Longitud</th>
                                <th>k (0-9)</th>
                                <th>m (Grados de libertad) </th>
                                <th>Error admitido</th>
                                <th>Valor Chi Cuadrado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $test->get('longitud')}}</td>
                                <td>{{ $test->get('k')}}</td>
                                <td>{{ $test->get('grados_libertad')}}</td>
                                <td>{{ $test->get('error_admitido')}}</td>
                                <td>{{ $test->get('chi_cuadrado')}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                              <th scope="col">Valor</th>
                              <th scope="col">Frecuencia observada (Oi)</th>
                              <th scope="col">Frecuencia esperada (Ei)</th>
                              <th scope="col">(Oi - Ei)^2 / Ei</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($test->get('frecuencia_observada')->keys() as $valor)
                                <tr>
                                    <td>{{ $valor }}</td>
                                    <td>{{ $test->get('frecuencia_observada')->all()[$valor]}}</td>
                                    <td>{{ $test->get('frecuencia_esperada')}}</td>
                                    <td>{{ $test->get('calculo_digito')->all()[$valor] }}</td>
                                </tr>
                            @endforeach
                            
                            <tr class="table-info">
                                <td colspan="3"><b>Total</b></td>
                                <td><b>{{ $test->get('sumatoria') }}</b></td>
                            </tr>
                          </tbody>
                    </table>
                </div>
            </div>
            
        </div>
      </div>
    </div>


    <div class="accordion accordion-flush my-4" id="accordionMonobits">
        <div class="accordion-item">
          <h4 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                <h4 class="h4">Resultado de Test MonoBits: 
                    @if ($test_mono->get('resultado'))
                        <span class="badge text-bg-success">APROBADO</span>
                    @else
                        <span class="badge text-bg-danger">DESAPROBADO</span>
                    @endif
                </h4>
            </button>
          </h4>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionMonobits">
            <div class="accordion-body">
    
                <div class="row my-4">
                    <div class="col">
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Longitud</th>
                                    <th>Cant. Uno</th>
                                    <th>Cant. Menos Uno</th>
                                    <th>P-valor</th>
                                    <th>Sesgo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $test_mono->get('cantidad') }}</td>
                                    <td>{{ $test_mono->get('unos') }}</td>
                                    <td>{{ $test_mono->get('menos_uno') }}</td>
                                    <td>{{ $test_mono->get('p_valor') }}</td>
                                    <td>{{ $test_mono->get('sesgo') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
          </div>
        </div>
</div>
@endsection