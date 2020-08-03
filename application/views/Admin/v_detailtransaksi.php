
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STUDIO FOTO - Bukti pemesanan</title>

    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/all.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/invoice.css'); ?>" rel="stylesheet">

</head>
<body>  
<div class="container-fluid invoice-container">

    <div class="row invoice-header">
        <div class="invoice-col">
        <?php foreach($pemesanan as $a){ ?> 
            <h2> <?php echo $a->nama_cus ?> </43>
            <h4> <?php echo $a->tgl_checkout ?> </43>
        </div>
        
        <div class="invoice-col text-center">
             <div class="invoice-status">
                <!-- <span class="paid">Paid</span> -->
                
                <?php if($a->opsi == 'DP') { ?>
                    <span class="paid">DP : <?php echo $a->dp ?></span>
                    <h4>(Kekurangan bayar : Rp <?php
                    $kekurangan = $a->total_bayar-$a->dp;
                    $format_indonesia = number_format ($kekurangan, 0, ',', '.');
                                     echo $format_indonesia; ?>)</h4>
                <?php }else{ ?>
                    <span class="paid">LUNAS : Rp <?php $format_indonesia = number_format ($a->total_bayar, 0, ',', '.');
                                     echo $format_indonesia; ?></span>
                    
                <?php } ?>
               
            </div>
        </div>
    </div><hr>
        
    

    <br />

   <h4><strong>Jenis Tempat :</strong> <?php echo $a->jenis ?>, <?php echo $a->lokasi ?></h4>
   <h4><strong> Tanggal dan Waktu Pemotretan :</strong> <?php echo $a->tgl_pemesanan ?>, <strong>Pukul </strong> <?php echo $a->waktu_pemesanan ?>-<?php echo $a->waktu_selesai ?></h4>
   <?php } ?>
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #2980b9;">
            <h3 class="panel-title" style="color: white;"><strong>Pemesanan Anda</strong></h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <td><strong>Detail Pemesanan</strong></td>
                            <td><strong>Keterangan</strong></td>
                            <td width="20%" class="text-center"><strong>Harga</strong></td>
                        </tr>
                    </thead>
                    <tbody>    
                        <?php foreach($pemesanan as $a){ ?> 
                        <tr>
                            <td>Jenis Kategori</td>
                            <td><?php echo $a->nama_kategori; ?></td>
                            <td class="text-center">Rp <?php $format_indonesia = number_format ($a->harga, 0, ',', '.');
                                     echo $format_indonesia; ?></td>
                        </tr>
                        
                        <tr>
                            <td>Jenis Dekorasi</td>
                            <td><?php echo $a->nama_dekorasi; ?></td>
                            <td class="text-center">Rp <?php $format_indonesia = number_format ($a->harga_dekorasi, 0, ',', '.');
                                     echo $format_indonesia; ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Sesi Pemotretan</td>
                            <td><?php echo $a->jumlah_sesi; ?></td>
                            <td class="text-center">Rp <?php $format_indonesia = number_format ($a->harga_sesi, 0, ',', '.');
                                     echo $format_indonesia; ?></td>
                        </tr>
                        <tr>
                            <td class="total-row text-right"></td>
                            <td class="total-row text-right"><strong>Total</strong></td>
                            <td class="total-row text-center">Rp <?php $format_indonesia = number_format ($a->total_bayar, 0, ',', '.');
                                     echo $format_indonesia; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading" style="background-color: white;">
            <h3 class="panel-title"><strong>Catatan</strong></h3>
        </div>
        
        <!-- memberikan keterangan untuk yang di proses dan terbayar -->
        <div class="panel-body">
        Pemesanan yang sudah dilakukan tidak bisa dibatalkan atau di uangkan kembali.
        </div>
    </div>

    <p style="color: orange;">*Terimakasih atas Pemesanan Anda.</p>

    <div class="pull-right btn-group btn-group-sm hidden-print">
        <a href="javascript:window.print()" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        <!-- <a href="dl.php?type=i&amp;id=763834" class="btn btn-default"><i class="fa fa-download"></i> Download</a> -->
    </div>
</div>
</body>
</html>