
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-market - Bukti pemesanan</title>

    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/all.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/invoice.css'); ?>" rel="stylesheet">

</head>
<body>  
<div class="container-fluid invoice-container">

    <div class="row invoice-header">
        <div class="invoice-col">
           
            <h4>Kode Pesan : <?php echo $idpesan; ?></43>
        </div>
        
        <div class="invoice-col text-center">
             <div class="invoice-status">
                <!-- <span class="paid">Paid</span> -->
                <?php if ($status=='Terbayar') {
                    echo '<span class="paid">'.$status.'</span>';
                } else{
                    echo '<span class="unpaid">'.$status.'</span>';
                }
                ?>
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
                <?php foreach($inv2 as $a){ 
                     echo $a->nama_pengirim; 
                ?><br />                        
                <?php echo $a->desa; ?>&nbsp;-&nbsp;<?php echo $a->kecamatan; ?>&nbsp;-&nbsp;<?php echo $a->kabupaten; ?>&nbsp;-&nbsp;<?php echo $a->provinsi; ?><br />
                <?php echo $a->telp; ?><br />
                <?php } ?>
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
            <?php if ($status=='Proses') {
                echo 'Lakukan pembayaran dalam jangka waktu 24 jam setelah transaksi dilakukan.';
            } else {
                echo 'Pembayaran Telah Dilakukan, bisa Melanjutkan ke Tahap Selanjutnya.';
            }
            ?>
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
                        <?php foreach($inv as $a){ ?> 
                        <tr>
                            <td><?php echo $a->nama_produk; ?></td>
                            <td><?php echo $a->jumlah; ?></td>
                            <td class="text-center">Rp <?php $format_indonesia = number_format ($a->total, 0, ',', '.');
                                     echo $format_indonesia; ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td>Pengiriman</td>
                            <td></td>
                            <td class="text-center">Rp <?php $format_indonesia = number_format ($pengiriman, 0, ',', '.');
                                     echo $format_indonesia; ?> </td>
                        </tr>
                        <tr>
                            <td class="total-row text-right"></td>
                            <td class="total-row text-right"><strong>Total</strong></td>
                            <td class="total-row text-center">Rp <?php $format_indonesia = number_format ($total2, 0, ',', '.');
                                     echo $format_indonesia; ?></td>
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