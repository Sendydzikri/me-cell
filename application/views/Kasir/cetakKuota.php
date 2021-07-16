<body>
        <center>
        <table border="1" class="table table-dark">
            <tbody> 
              <center><h1>STRUK PEMBELIAN PULSA</h1><br></center>              
              <?php $no=1; foreach($transaksi as $data){ ?>
              <tr>
                <th>NO</th>
                <th>ID Transaksi</th>
                <th>ID Pelanggan</th>
                <th>No HP</th>
                <th>Jumlah Kuota</th>
                <th>Metode Bayar</th>

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