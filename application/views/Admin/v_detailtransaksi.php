
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
           
            <h4>Kode Pesan : 1</43>
        </div>
        
        <div class="invoice-col text-center">
             <div class="invoice-status">
                <!-- <span class="paid">Paid</span> -->
                <span class="paid">'.$status.'</span>
            </div>
        </div>
    </div><hr>
    
    <div class="row">
        <div class="invoice-col right">
            <strong>Bayar ke</strong>
            <address class="small-text">
                @Lumintu.Mebel<br />
                <br />
                Alamat : <br />
                Jl. S.Parman<br>
                Sumbersari<br />
                Jember <br />
                Telp : +6285236717000
            </address>
        </div>
        <div class="invoice-col">
            <strong>Ditujukan kepada:</strong>
            <address class="small-text">
                     echo $a->nama_pengirim; 
                ?><br />                        
                Keting Jombang Jember
                092018289238<br />
            </address>
        </div>
    </div>

    <div class="row">
        <div class="invoice-col right">
            <strong>Cara pembayaran :</strong><br>
            <span class="small-text">
                Transfer ke Bank BNI<br />
                No. rek : 9857694759587695
            </span>
            <br /><br />
        </div>
        <div class="invoice-col">
            
        </div>
    </div>
    <br />

    <div class="panel panel-info">
        <div class="panel-heading" style="background-color: white;">
            <h3 class="panel-title"><strong>Catatan</strong></h3>
        </div>
        
        <!-- memberikan keterangan untuk yang di proses dan terbayar -->
        <div class="panel-body">
        Lakukan pembayaran dalam jangka waktu 24 jam setelah transaksi dilakukan.
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #E74C3C;">
            <h3 class="panel-title" style="color: white;"><strong>Produk yang di pesan</strong></h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <td><strong>Produk</strong></td>
                            <td><strong></strong></td>
                            <td width="20%" class="text-center"><strong>Jumlah</strong></td>
                        </tr>
                    </thead>
                    <tbody>    
                        <?php foreach($pemesanan as $a){ ?> 
                        <tr>
                            <td><?php echo $a->nama_kategori; ?></td>
                            <td><?php echo $a->nama_dekorasi; ?></td>
                            <td class="text-center">Rp <?php $format_indonesia = number_format ($a->total_bayar, 0, ',', '.');
                                     echo $format_indonesia; ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td>Status pembayaran</td>
                            <td></td>
                            <td class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="total-row text-right"></td>
                            <td class="total-row text-right"><strong>Total</strong></td>
                            <td class="total-row text-center">Rp</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <p style="color: orange;">*Terimakasih telah Mempercayai Kami Lumintu Mebel.</p>

    <div class="pull-right btn-group btn-group-sm hidden-print">
        <a href="javascript:window.print()" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        <!-- <a href="dl.php?type=i&amp;id=763834" class="btn btn-default"><i class="fa fa-download"></i> Download</a> -->
    </div>
</div>
</body>
</html>