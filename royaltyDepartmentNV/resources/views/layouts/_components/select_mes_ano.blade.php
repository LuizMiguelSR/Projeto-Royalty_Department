<span>Ordenar por mês e ano: </span>
<div class="row mx-5">
    <div class="col-md-4">
        <form class="row tabela mt-3"method="GET" action="{{ $slot }}">
        @csrf
            <div class="input-group mb-3">
                <input class="form-control" type="month" name="data_hora_inicio">
                <button type="submit" class="btn btn-primary">Consultar</button>
            </div>
        </form>
    </div>
</div>
<br><br>
