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
        <th>Kode Order</th>
        <th>Nama Tamu</th>
        <th>Jenis Kamar</th>
        <th>Nomor Kamar</th>
        <th>Tanggal Masuk</th>
        <th>Tanggal Keluar</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($check as $list){
        if($list['order_status'] == 2){ ?>
        <tr <?php
        switch ($list['order_status']){
            case "1":
                echo 'class="warning"';
                break;
            case "2":
                echo 'class="success"';
                break;
            case "3":
                echo 'class="danger"';
                break;

        }
        ?>>
            <td><?=$list['kode']?></td>
            <td><?=$list['nama_depan'].' '.$list['nama_belakang'] ?></td>
            <td><?=$list['title']?></td>
            <td><?=$list['numbers']?></td>
            <td align="center"><?php echo date('d M Y', strtotime(str_replace('-','/', $list['check_in']))); ?></td>
            <td align="center"><?php echo date('d M Y', strtotime(str_replace('-','/', $list['check_out']))); ?></td>
        </tr>
    <?php }} ?>
    </tbody>
</table>