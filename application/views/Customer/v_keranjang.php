<?php $this->load->view('element/head') ?>

<body>
    <?php $this->load->view('element/header') ?>
    <!-- Page Add Section Begin -->
    <section class="page-add cart-page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Keranjang<span>.</span></h2>
                        <a href="#">Home</a>
                        <a href="#">Dresses</a>
                        <a class="active" href="#">Night Dresses</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <img src="img/add.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Cart Page Section Begin -->
    <div class="cart-page">
        <div class="container">
            <div class="cart-table">
                <table>
                    <thead>
                        <tr>
                            <th class="product-h">Kategori</th>
                            <th>Jumlah Sesi</th>
                            <th class="quan">Dekorasi</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Detail</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cus as $c) { ?>
                            <tr>

                                <td class="product-col">
                                    <img src="img/product/product-1.jpg" alt="">
                                    <div class="p-title">
                                        <h5><?= $c->nama_kategori ?><br>
                                            <p>Rp.<?= number_format($c->harga, 0, ',', '.')  ?></p>
                                        </h5>
                                        <?php if ($c->status_cus == "Belum Checkout") { ?>
                                            <a style="font-size: 12px;color: red;" href="<?= base_url('Customer/Bayar/index/' . $c->id_pemesanan) ?>">Checkout Now</a>
                                        <?php  } else { ?>
                                        <?php } ?>
                                    </div>
                                </td>
                                <td class="quantity-col"><?= $c->jumlah_sesi . ' Sesi' ?><br>
                                    <p>Rp. <?= number_format($c->harga_sesi, 0, '.', '.') ?></p>
                                </td>
                                <td class="quantity-col">
                                    <?= $c->nama_dekorasi . ' Sesi' ?><br>
                                    <p>Rp. <?= number_format($c->harga_dekorasi, 0, '.', '.') ?></p>
                                </td>
                                <td class="total">Rp. <?= number_format($c->harga + $c->harga_sesi + $c->harga_dekorasi, 0, ',', '.') ?></td>
                                <td class="product-close">
                                    <p style="text-align: center; margin-right:10px;"><?= $c->status_cus ?></p>
                                </td>
                                <td class="product-close">
                                <?php if($c->status_cus == 'Pesanan Selesai') { ?>
                                    <a target="_blank" href="<?= base_url('Customer/Keranjang/nota/'.$c->id_pemesanan); ?>" class="button btn-info form-control">Nota</a>
                                <?php }else{ ?>
                                    <button class="button btn-info form-control" data-toggle="modal" data-target="#modalDetail<?= $c->id_pemesanan ?>" type="button">Detail</button>
                                <?php } ?>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="cart-btn">
                <div class="row">

                </div>
            </div>
        </div>
    </div>
    <?php foreach ($cus as $c) { ?>
        <div class="modal fade" id="modalDetail<?= $c->id_pemesanan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $c->nama_cus ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="text-align: center;">Data Pemotretan Anda</p>
                        <p>Tanggal : <b><?= $c->tgl_pemesanan ?></b></p>
                        <p>Waktu : <b><?= $c->waktu_pemesanan . '-' . $c->waktu_selesai ?></b></p>
                        <?php if ($c->jenis == 'Tempat Lain') { ?>
                            <p> Lokasi : <b><?= $c->lokasi  ?></b></p>
                        <?php } else { ?>
                            <p>Jenis : <b><?= $c->jenis  ?></b></p>
                        <?php } ?>
                        <?php
                        $this->db->join('pemesanan', 'pemesanan.id_pemesanan=konfirmasi_pembayaran.id_pemesanan');
                        $this->db->where('konfirmasi_pembayaran.id_pemesanan', $c->id_pemesanan);
                        $cek = $this->db->get('konfirmasi_pembayaran')->row();
                        if ($cek) {
                            if ($cek->opsi == "DP") {

                        ?>
                                <p style="float: right;"> Pembayaran : <?= $cek->opsi . ' (' . $cek->dp . ')' ?></p>
                            <?php } else { ?>
                                <p style="float: right;"> Pembayaran : <?= $cek->opsi ?></p>
                        <?php }
                        } ?>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-danger" href="">Hapus</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Cart Page Section End -->
    <!-- Logo Section End -->
    <?php $this->load->view('element/footer') ?>
</body>

</html>