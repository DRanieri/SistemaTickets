<script>
    $(document).ready(function(){
        $(document).on('click', '.eliminar-usuario', function(event)
        {
            var usuario_id = $(this).attr('usuario_id');
            $('#usuario_id').val(usuario_id);
        });
    });
</script>