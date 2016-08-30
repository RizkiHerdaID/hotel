<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        table {
            font-size: 9pt;
        }
        @page {
            margin: 0mm 5mm ;
            border: 1px solid blue;
        }
    </style>
</head>
<body>
<h4>Struk Pembayaran Hotel</h4>
<h5>Nomor Kwitansi : <?=$kwitansi?></h5>
<h5>Berikut rincian dana yang harus di bayar : </h5>
<?php foreach ($hargaSewa as $sewa) {
    echo '<table style="width:100%" class="table"';

    echo '<th>';
    echo '<td width="30%"><b>Nama</b></td>';
    echo '<td width="30%"><b>Harga</b></td>';
    echo '<td width="20%"><b>Jumlah</b></td>';
    echo '<td width="30%" align="center"><b>Total</b></td>';
    echo '</th>';

    echo '<tr>';
    echo '<td>Sewa Kamar</td>';
    echo '<td>'.'Rp. '.number_format($sewa['price'], '0' , '' , '.' ) . ',-</td>';
    echo '<td>'.$sewa['day'].' hari</td>';
    echo '<td align="right">'.'Rp. '.number_format($sewa['price']*$sewa['day'], '0' , '' , '.' ) . ',-</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>Diskon Kamar</td>';
    echo '<td>'.'Rp. - '.number_format($sewa['price']*$sewa['diskon']/100, '0' , '' , '.' ) . ',-</td>';
    echo '<td>'.$sewa['day'].' hari</td>';
    echo '<td align="right">'.'Rp. - '.number_format($sewa['price']*$sewa['day']*$sewa['diskon']/100, '0' , '' , '.' ) . ',-</td>';
    echo '</tr>';
    foreach ($foods as $food) {
        echo '<tr>';
        echo '<td>'.$food['nama'].'</td>';
        echo '<td>'.'Rp. '.number_format($food['harga'], '0' , '' , '.' ) . ',-</td>';
        echo '<td>'.$food['jumlah'].'</td>';
        echo '<td align="right">'.'Rp. '.number_format($food['harga']*$food['jumlah'], '0' , '' , '.' ) . ',-</td>';
        echo '</tr>';
    }

    foreach ($services as $service) {
        echo '<tr>';
        echo '<td>'.$service['nama'].'</td>';
        echo '<td>'.'Rp. '.number_format($service['harga'], '0' , '' , '.' ) . ',-</td>';
        echo '<td>'.$service['jumlah'].'</td>';
        echo '<td align="right">'.'Rp. '.number_format($service['harga']*$service['jumlah'], '0' , '' , '.' ) . ',-</td>';
        echo '</tr>';
    }
    echo '</table>';

    echo '<table style="width:100%; font-weight:bold;" class="table"';

    echo '<tr>';
    echo '<td></td>';
    echo '<td align="right">-------------------</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>Total</td>';
    echo '<td align="right">Rp. '.number_format($sewa['payment_total']-$sewa['ppn'], '0' , '' , '.' ) . ',-</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>PPn</td>';
    echo '<td align="right">Rp. '.number_format($sewa['ppn'], '0' , '' , '.' ) . ',-</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>Total Keseluruhan</td>';
    echo '<td align="right">Rp. '.number_format($sewa['payment_total'], '0' , '' , '.' ) . ',-</td>';
    echo '</tr>';

    echo '</table>';
} ?>

</body>
</html>