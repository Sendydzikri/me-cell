<body>
        <center>
        <table border="1" class="table table-dark">
            <tbody> 
              <center><h1>STRUK PEMBELIAN</h1><br></center>              
              <?php foreach($transaksi as $data){ ?>
              <tr>

                <th>ID Transaksi </th>
                <th>ID Pelanggan </th>                
                <th>ID Barang </th>
                <th>Jumlah Barang</th>
                <th>Total Harga</th>
                <th>Tanggal Transaksi</th>
              </tr>
              <tr>
                <td><?= $data['id_transaksi'];?></td>
                <td><?= $data['id_pelanggan'];?></td>
                <td><?= $data['id_barang'];?></td>
                <td><?= $data['jumlah_barang'];?></td>
                <td><?= $data['total_harga']; ?></td>
                <td><?= $data['tanggal_transaksi'];?></td>
              </tr>
            <?php }  ?>
            </tbody>
          </table>
        </center>
          <script>
          window.print();
        </script>
    </body>