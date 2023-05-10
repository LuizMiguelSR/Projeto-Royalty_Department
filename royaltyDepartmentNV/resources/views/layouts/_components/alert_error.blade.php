@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show position-fixed bottom-0 end-0 mb-4 me-4" role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        // fecha o alerta após 3 segundos
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 5000);
    </script>
@endif
