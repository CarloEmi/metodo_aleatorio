@extends('layout.index')

@section('contenido')
    <h2>Generar Secuencia - Congruencia Fundamental</h2>
    <form method="POST" action="{{ route('congruencia.generar') }}" id="congruenciaForm">
        @csrf

        <div id="semillasContainer">
            <!-- Campo de entrada inicial para semillas -->
            <div class="semillaInput">
                <label for="semillas">Semillas:</label>
                <input type="text" name="semillas[]" required>
                <button type="button" class="btn btn-primary agregarSemilla">+</button>
            </div>
        </div>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Agregar campo de entrada de semilla al hacer clic en el botón '+'
            document.querySelector('.agregarSemilla').addEventListener('click', function() {
                const semillasContainer = document.getElementById('semillasContainer');
                const nuevaSemillaInput = document.createElement('div');
                nuevaSemillaInput.classList.add('semillaInput');
                nuevaSemillaInput.innerHTML = `
                    <label for="semillas">Semillas:</label>
                    <input type="text" name="semillas[]" required>
                    <button type="button" class="btn btn-primary agregarSemilla">+</button>
                `;
                semillasContainer.appendChild(nuevaSemillaInput);
                // Agregar evento para eliminar el campo de entrada de semilla al hacer clic en el botón '-'
                nuevaSemillaInput.querySelector('.agregarSemilla').addEventListener('click', function() {
                    nuevaSemillaInput.remove();
                });
            });
        });
    </script>
@endsection
