<!-- KONTAK -->
<br><br><br>
<div class="kontak">
    <hr class="my-1">
    <section id="contact" class="dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Alamat :</h2>
                        <p>Jl Jendral Sudirman Basis kel Baros kec.Cimahi Tengah <br>Kota Cimahi</p>

                    </div>

    <script>
    function openNav() {
        document.getElementById("sideNavigation").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("sideNavigation").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
    </script>

    <script>  

        $(document).ready(function() {

            $(".balas").on('click',function(){

                var id = this.id;
                $('#id_pelanggan').val(id);
                $.ajax({
                type: "POST",
                url : "<?= base_url('C_Kasir/ambilDataChat/') ?>",
                dataType : "JSON",
                data : {id:id},
                success : function(data){
                  $('#scroll').append(data);

                }

              });

            });

            $(".close").on('click',function(){

                $('#scroll').empty();

            }); 

        });

    </script> 


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/js/datatables-simple-demo.js'); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<div class="modal fade" id="chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><span class="fa fa-comments"> </span> Chat Dengan User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open_multipart('C_Kasir/insertChat'); ?>   
            <div class="modal-body">
              <div id="scroll">
        
            </div>
            <div class="form-group"> 
                    <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="">
                    <textarea class="form-control" name="isi" placeholder="Ketikan Chat Anda Disini...."></textarea>
                    <br>  
                    <input type="file" name="file" class="form-control">

            </div>              
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" >Kirim</button>
            </div>         
          </div>
          <?php echo form_close() ?>
        </div>
    </div>
    </div>

    </body>
</html>