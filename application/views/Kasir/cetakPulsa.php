<body>
        <center>
        <table border="1" class="table table-dark">
            <tbody> 
              <center><h1>STRUK PEMBELIAN PULSA</h1><br></center>              
              <?php $no = 1; foreach($transpulsa as $data){ ?>
              <tr>
                        <th>NO</th>
                        <th>ID Transaksi</th>
                        <th>ID Pelanggan</th>
                        <th>Jumlah Pulsa</th>
                        <th>No HP</th>
                        <th>Total Harga</th>
                        <th>Metode Bayar</th>
                        <th>Aksi</th>
              </tr>
                  <tr>
                    <td><?php echo $no++?></td>
                      <td><?php echo $data['id_transpulsa'];  ?></td>
                      <td><?php echo $data['id_pelanggan']; ?></td>
                      <td><?php echo $data['jumlah_saldo']  ?></td>
                      <td><?php echo $data['no_hp'];   ?></td>
                      <td><?php echo $data['total_harga'];  ?></td>
                      <td><?php echo $data['metode_bayar']; ?></td>
                  </tr>
            <?php }  ?>
            </tbody>
          </table>
        </center>
          <script>
          window.print();
        </script>
    </body>