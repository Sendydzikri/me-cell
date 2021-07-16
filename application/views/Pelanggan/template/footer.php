      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
      <script src="<?= base_url('assets/js/datatables-simple-demo.js'); ?>"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

      
      <script type="text/javascript" src="<?php echo base_url('assets/js/sidenav.js'); ?>"></script>></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script  src="<?= base_url ();?>assets/js/sweetalert2.all.min.js"></script> 


      <script type="text/javascript" src="<?php echo base_url('assets/js/keranjang.js'); ?>"></script></script>
      <script>
        
        $("#tambahButton").click(function(){
            alert( "Handler for .click() called." );
        });

    </script>
    <script>  
        $(document).ready(function() {

            function getDataChat(){
              $.ajax({
                type: "POST",
                url : "<?= base_url('C_Pelanggan/updateBarang/') ?>",
                dataType : "JSON",
                data : {id:id , id_barang:id_barang, jumlah_barang:jumlah_barang},
                success : function(data){
                  if(data > 0){
                    $(".harga."+ getID).text(data);                    
                  }else{
                      Swal.fire(

                      'Stock Tidak Cukup !',
                      'Stock Barang Hanya Tertinggal ' + data['stock'],
                      'error'

                    );
                    
                  }

                }

              });
            }

        });

    </script> 
</body>




</html>