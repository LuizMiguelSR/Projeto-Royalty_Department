<span>Ordenar por mês e ano: </span>
<div class="row mx-5">
    <div class="col-md-12">
        <form class="row tabela mt-3"method="GET" action="{{ $slot }}">
        @csrf
            <div class="input-group mb-3">
                <select id="mes" name="mes" class="form-select" aria-label="Default select example">
                    <option value="" selected>Selecione um mês...</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ old('mes') == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
                <select id="ano" name="ano" class="form-select" aria-label="Default select example">
                    <option value="" selected>Selecione um ano...</option>
                    @for ($i = date('Y'); $i >= date('Y') - 10; $i--)
                        <option value="{{ $i }}" {{ old('ano') == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
                <button type="submit" class="btn btn-primary">Consultar</button>
            </div>
        </form>
    </div>
</div>
<br><br>
