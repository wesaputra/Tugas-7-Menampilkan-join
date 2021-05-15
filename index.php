<html>
   <head>
      <title>Menampilkan Data Tabel MySQL Dengan mysqli_fetch_array</title>
      <style>
         body {font-family:tahoma, arial}
         table {border-collapse: collapse}
         th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030}
         th {background: #CCCCCC; font-size: 12px; border-color:#B0B0B0}
      </style>
   </head>
   <body>
      <h3>Tabel Keuangan (mysqli_fetch_array)</h3>
      <table>
         <thead>
            <tr>
               <th>No Invoice</th>
               <th>No Sparepart</th>
               <th>Tanggal Transaksi</th>
               <th>Sisa Bayar</th>
               <th>Discount</th>
            </tr>
         </thead>
         <?php
            include 'koneksi.php';		
            $sql = 'SELECT  * FROM keuangan';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['no_invoice'] ?></td>
               <td><?php echo $row['no_sparepart'] ?></td>
               <td><?php echo $row['tanggal_transaksi'] ?></td>
               <td><?php echo $row['sisa_bayar'] ?></td>
               <td><?php echo $row['discount'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      <h3>Tabel Pelanggan (mysqli_fetch_row)</h3>
      <table>
         <thead>
            <tr>
               <th>No Polisi</th>
               <th>Tipe Motor</th>
               <th>Alamat</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT  * FROM pelanggan';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row[0] ?></td>
               <td><?php echo $row[1] ?></td>
               <td><?php echo $row[2] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      <h3>Tabel Service (mysqli_fetch_row)</h3>
      <table>
         <thead>
            <tr>
               <th>Yss Code</th>
               <th>No Polisi</th>
               <th>Nama Technician</th>
               <th>Jenis Service</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT  * FROM service';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row[0] ?></td>
               <td><?php echo $row[1] ?></td>
               <td><?php echo $row[2] ?></td>
               <td><?php echo $row[3] ?></td>
             
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      <h3>Tabel Sparepart (mysqli_fetch_row)</h3>
      <table>
         <thead>
            <tr>
               <th>No Sparepart</th>
               <th>Yss Code</th>
               <th>Nama Sparepart</th>
               <th>Qty</th>
               <th>Harga Sparepartt</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT  * FROM sparepart';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row[0] ?></td>
               <td><?php echo $row[1] ?></td>
               <td><?php echo $row[2] ?></td>
               <td><?php echo $row[3] ?></td>
               <td><?php echo $row[4] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      <h3>Inner Join (mysqli_fetch_assoc)</h3>
      <h4> (menampilkan semua data pelanggan dari tabel pelanggan yang melakukan service)</h4>
      <table>
         <thead>
            <tr>
               <th>No Invoice</th>
               <th>Tanggal</th>
               <th>No Polisi </th>
               <th>Tipe Motor</th>
               <th>Jenis Service</th>
               <th>Sisa Bayar </th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT keuangan.no_invoice, tanggal_transaksi, pelanggan.no_polisi, tipe_motor, service.jenis_service, keuangan.sisa_bayar 
            from pelanggan 
            join service on pelanggan.no_polisi=service.no_polisi 
            join sparepart on sparepart.yss_code=service.yss_code 
            join keuangan on keuangan.no_sparepart=sparepart.no_sparepart';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_assoc($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['no_invoice'] ?></td>
               <td><?php echo $row['tanggal_transaksi'] ?></td>
               <td><?php echo $row['no_polisi'] ?></td>
               <td><?php echo $row['tipe_motor'] ?></td>
               <td><?php echo $row['jenis_service'] ?></td>
               <td><?php echo $row['sisa_bayar'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      </table>
      <h3>Left Outer Join </h3>
      <h4> (mampilkan semua data kendaraan dari tabel barang dari transaksi)</h4>
      <table>
         <thead>
            <tr>
               <th>No Invoice</th>
               <th>Tanggal</th>
               <th>No Polisi </th>
               <th>Tipe Motor</th>
               <th>Jenis Service</th>
               <th>Sisa Bayar </th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT keuangan.no_invoice, tanggal_transaksi, pelanggan.no_polisi, tipe_motor, service.jenis_service, keuangan.sisa_bayar 
            from pelanggan 
            left join service on pelanggan.no_polisi=service.no_polisi 
            left join sparepart on sparepart.yss_code=service.yss_code 
            left join keuangan on keuangan.no_sparepart=sparepart.no_sparepart';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_assoc($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['no_invoice'] ?></td>
               <td><?php echo $row['tanggal_transaksi'] ?></td>
               <td><?php echo $row['no_polisi'] ?></td>
               <td><?php echo $row['tipe_motor'] ?></td>
               <td><?php echo $row['jenis_service'] ?></td>
               <td><?php echo $row['sisa_bayar'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
   </body>
</html>