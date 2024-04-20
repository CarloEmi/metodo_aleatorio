<form action="{{ route('prueba') }}" method="GET">
    @csrf

    <div class="text-danger mb-3 small">(*) Campo obligatorio</div>
    <div class="form-group">
        <label for="secuencia">Secuencia<span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('secuencia') is-invalid @enderror" id="secuencia" name="secuencia" value="{{ old('secuencia') }}" maxlength="50" required>
        @error('secuencia')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Probar Secuencia</button>
        <a href="{{ route('') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
    </div>
</form>
