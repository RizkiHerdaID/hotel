<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h4>Berikut rincian dana yang harus di bayar : <br/><br/></h4>
<?php foreach ($hargaSewa as $sewa) {
	echo '<table style="width:100%" class="table"';

	echo '<th>';
	echo '<td width="30%"><b>Nama</b></td>';
	echo '<td width="30%"><b>Harga</b></td>';
	echo '<td width="20%"><b>Jumlah</b></td>';
	echo '<td width="30%"><b>Total</b></td>';
	echo '</th>';

	echo '<tr>';
	echo '<td>Sewa Kamar</td>';
	echo '<td>'.'Rp. '.number_format($sewa['price'], '0' , '' , '.' ) . ',-</td>';
	echo '<td>'.$sewa['day'].' hari</td>';
	echo '<td>'.'Rp. '.number_format($sewa['price']*$sewa['day'], '0' , '' , '.' ) . ',-</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>Diskon Kamar</td>';
	echo '<td>'.'Rp. - '.number_format($sewa['price']*$sewa['diskon']/100, '0' , '' , '.' ) . ',-</td>';
	echo '<td>'.$sewa['day'].' hari</td>';
	echo '<td>'.'Rp. - '.number_format($sewa['price']*$sewa['day']*$sewa['diskon']/100, '0' , '' , '.' ) . ',-</td>';
	echo '</tr>';
	foreach ($foods as $food) {
	echo '<tr>';
	echo '<td>'.$food['nama'].'</td>';
	echo '<td>'.'Rp. '.number_format($food['harga'], '0' , '' , '.' ) . ',-</td>';
	echo '<td>'.$food['jumlah'].'</td>';
	echo '<td>'.'Rp. '.number_format($food['harga']*$food['jumlah'], '0' , '' , '.' ) . ',-</td>';
	echo '</tr>';
	}

	foreach ($services as $service) {
	echo '<tr>';
	echo '<td>'.$service['nama'].'</td>';
	echo '<td>'.'Rp. '.number_format($service['harga'], '0' , '' , '.' ) . ',-</td>';
	echo '<td>'.$service['jumlah'].'</td>';
	echo '<td>'.'Rp. '.number_format($service['harga']*$service['jumlah'], '0' , '' , '.' ) . ',-</td>';
	echo '</tr>';
	}
	echo '</table>';

	echo '<div class="row">';
	echo '<div class="col-md-8"><h4>Total </h4></div>';
	echo '<div class="col-md-4 pull-right"><h4 align=right>Rp. '.number_format($sewa['payment_total']-$sewa['ppn'], '0' , '' , '.' ) . ',-</h4></div>';
	echo '</div>';

	echo '<div class="row">';
	echo '<div class="col-md-8"><h4>PPn</h4></div>';
	echo '<div class="col-md-4 pull-right"><h4 align=right>Rp. '.number_format($sewa['ppn'], '0' , '' , '.' ) . ',-</h4></div>';
	echo '</div>';

	echo '<div class="row">';
	echo '<div class="col-md-8"><h4>Total Keseluruhan</h4></div>';
	echo '<div class="col-md-4 pull-right"><h4 align=right>Rp. '.number_format($sewa['payment_total'], '0' , '' , '.' ) . ',-</h4></div>';
	echo '</div>';
	
} ?>

</body>
</html>