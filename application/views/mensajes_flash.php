<script type="text/javascript">
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        <?php

            if($this->session->flashdata('success')){ 

                $msg_string = '"'.$this->session->flashdata('success').'"';
                ?>  
                    Toast.fire({
                        icon: 'success',
                        title: <?php echo $msg_string; ?>
                    })
                <?php 

            }else if($this->session->flashdata('warning')){  

                $msg_string = '"'.$this->session->flashdata('warning').'"';
                ?>
                    Toast.fire({
                        icon: 'warning',
                        title: <?php echo $msg_string; ?>
                    })
                <?php

            }else if($this->session->flashdata('info')){  

                $msg_string = '"'.$this->session->flashdata('info').'"';
                ?>  
                    Toast.fire({
                        icon: 'info',
                        title: <?php echo $msg_string; ?>
                    })
                <?php 
            }else if($this->session->flashdata('error')){  

                $msg_string = '"'.$this->session->flashdata('error').'"';

                ?>  
                    Toast.fire({
                        icon: 'error',
                        title: <?php echo $msg_string; ?>
                    })
                <?php 
            }
        ?>
    });
</script>