<script>
    $(document).ready(function(){
        $(document).on('click', '.eliminar-ticket', function(event){
            var id = $(this).attr('ticket_id');
            $('#ticket_id').val(id);
        });
    });
</script>