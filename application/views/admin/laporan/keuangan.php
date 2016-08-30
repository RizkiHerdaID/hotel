<style type="text/css">
    table {
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid black;
        text-align: center;
    }
</style>
<table border="1" class="table" style="width:100%">
    <thead>
    <tr>
        <th>No Kwitansi</th>
        <th>Kode Order</th>
        <th>Nama</th>
        <th>Sewa Kamar<br/>/ Hari</th>
        <th>Jumlah <br/>Hari</th>
        <th>Sewa <br/>Setelah Diskon</th>
        <th>PPN 10%</th>
        <th>Total<br/> Bayar</th>
        <th>Tanggal<br/> Bayar</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($payment as $list): ?>
        <?php if($list['order_status'] == 4){ ?>
            <tr>
                <td><?=$list['kwitansi']?></td>
                <td><?=$list['kode']?></td>
                <td><?=$list['nama_depan'].' '.$list['nama_belakang']?></td>
                <td style="vertical-align:middle; text-align: center;"><?php echo 'Rp. ' . number_format($list['price'], '0' , '' , '.' ) . ',-'; ?></td>
                <td style="text-align: center;"><?php if($list['order_status']>2){ echo $list['day'].' hari'; }?></td>
                <td><?php if($list['order_status']>2){ echo 'Rp. ' . number_format($list['payment_room'], '0' , '' , '.' ) . ',-'; }?></td>
                <td><?php if($list['order_status']>2){ echo 'Rp. ' . number_format($list['ppn'], '0' , '' , '.' ) . ',-'; }?></td>
                <td><?php if($list['order_status']>2){ echo 'Rp. ' . number_format($list['payment_total'], '0' , '' , '.' ) . ',-'; }?></td>
                <td style="vertical-align:middle; text-align: center;"><?php  if($list['order_status'] > 3){echo date('d M Y', strtotime(str_replace('-','/', $list['payment_date'])));} ?></td>
            </tr>
        <?php } endforeach; ?>
    </tbody>
</table>