<html>
<head>
  <title>Cetak PDF</title>
  <style>
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
    }
    table td {
      word-wrap:break-word;
      width: 20%;
    }
  </style>
</head>
<body>
    <b><?php echo $ket; ?></b><br /><br />
    
  <table border="1" cellpadding="8">
  <tr>
    <th>Tanggal</th>
    <th>Kode Transaksi</th>
    <th>Barang</th>
    <th>Jumlah</th>
    <th>Total Harga</th>
  </tr>
    <?php
    if( ! empty($transaksi)){
      $no = 1;
      foreach($transaksi as $data){
            $tgl = date('d-m-Y', strtotime($data->tgl));
        echo "<tr>";
        echo "<td>".$tgl."</td>";
        echo "<td>".$data->jalur."</td>";
        echo "<td>".$data->tgl_pengiriman."</td>";
        echo "<td>".$data->pic."</td>";
        echo "<td>".$data->driver."</td>";
        echo "</tr>";
        $no++;
      }
    }
    ?>
  </table>
</body>
</html>
