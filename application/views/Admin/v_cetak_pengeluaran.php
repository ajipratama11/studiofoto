<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/studio/img/logo2.png">
<title>ADMIN | STUDIO</title>
<link href="<?= base_url() ?>assets/admin/css/style_cetak.css" rel="stylesheet">
<img src="<?= base_url() ?>assets/studio/img/logo2.png" width="130px" height="60px" alt="homepage" class="light-logo" />
<h4 style="text-align: center;">Laporan Pengeluaran Bulan <?= $bulan ?> </h4><br>
<div class="">
    <table class="table table-bordered">
        <thead style="font-size: 12px;">
            <tr>
                <th>
                    No.
                </th>
                <th>
                    Id Pengeluaran
                </th>
                <th>
                    Kebutuhan
                </th>
                <th>
                    Biaya
                </th>

                <th>
                    Tanggal
                </th>
            </tr>
        </thead>
        <tbody style="font-size: 12px;">
            <?php
            $i = 1;
            foreach ($list as $l) { ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $l->id_pengeluaran ?></td>
                    <td><?= $l->nama_pengeluaran ?></td>
                    <td>Rp.<?= number_format($l->biaya_pengeluaran, 0, ',', '.')  ?></td>
                    <td><?= $l->tgl_pengeluaran ?></td>


                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div>
        <p style="float: right; color:brown; font-size:18px;">Total : Rp. <?= number_format($total->total, 0, ',', '.')  ?></p>
    </div>
</div>
<script>
    window.print();
</script>