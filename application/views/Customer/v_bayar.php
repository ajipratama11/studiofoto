<?php $this->load->view('element/head') ?>

<body>
    <?php $this->load->view('element/header') ?>
    <!-- Page Add Section Begin -->
    <!-- Header Info Begin -->
    <div class="header-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="header-item">
                        <img src="img/icons/delivery.png" alt="">
                        <p>Free shipping on orders over $30 in USA</p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-lg-center">
                    <div class="header-item">
                        <img src="img/icons/voucher.png" alt="">
                        <p>20% Student Discount</p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-xl-right">
                    <div class="header-item">
                        <img src="img/icons/sales.png" alt="">
                        <p>30% off on dresses. Use code: 30OFF</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Info End -->
    <!-- Header End -->

    <!-- Page Add Section Begin -->
    <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Bayar Sekarang<span>.</span></h2>
                    </div>
                </div>
                <div class="col-lg-8">
                    <img src="img/add.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Cart Total Page Begin -->
    <section class="cart-total-page spad">
        <div class="container">
            <form action="<?= base_url('Customer/Bayar/bayar') ?>" method="post" class="checkout-form" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Your Information</h3>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Name*</p>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" placeholder="First Name" value="<?= $bayar->nama_cus ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">No Hp*</p>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" value="<?= $bayar->no_hp ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Email*</p>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" value="<?= $bayar->email_cus ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Tanggal Pemotretan*</p>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" value="<?= formatHariTanggal($bayar->tgl_pemesanan)  ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Waktu Pemotretan*</p>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" value="<?= $bayar->waktu_pemesanan . '-' . $bayar->waktu_selesai ?>">
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="order-table">
                            <div class="cart-item">
                                <span>Kategori</span>
                                <p class="product-name"><?= $bayar->nama_kategori . ' (Rp.' . number_format($bayar->harga, 0, ',', '.') . ')'  ?></p>
                            </div>
                            <div class="cart-item">
                                <span>Jumlah Sesi</span>
                                <p class="product-name"><?= $bayar->jumlah_sesi . ' sesi (Rp. ' . number_format($bayar->harga_sesi, 0, ',', '.') . ')' ?></p>
                            </div>
                            <div class="cart-item">
                                <span>Dekorasi</span>
                                <p class="product-name"><?= $bayar->nama_dekorasi . ' (Rp. ' . number_format($bayar->harga_dekorasi, 0, ',', '.') . ')' ?></p>
                            </div>

                            <div class="cart-total">
                                <span>Total Bayar</span>
                                <p><?= 'Rp. ' . number_format($bayar->harga + $bayar->harga_sesi + $bayar->harga_dekorasi, 0, ',', '.')  ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="payment-method">
                            <h3>Transfer</h3>
                            <?php echo $this->session->flashdata('gagal'); ?>
                            <ul>

                                <div>
                                    <li class=" mt-4">No Rekening </li>
                                    <h4 class=" mt-4">0038650807 (Bank Jatim)</h4>
                                    <li class=" mt-4">Opsi Pembayaran </li>
                                    <input type="radio" name="opsi" id="rad1" value="Lunas" class="rad" required /> Bayar Lunas
                                    <input type="radio" name="opsi" id="rad2" value="DP" class="rad ml-5" required /> Bayar DP
                                    <input type="text" name="id_pemesanan" value="<?= $bayar->id_pemesanan ?>" hidden />
                                    <input name="total_bayar" value="<?= $bayar->harga + $bayar->harga_sesi + $bayar->harga_dekorasi  ?>" hidden></input>
                                    <!-- <div id="form1" style="display:none">
                                    Input1: <input name="input" type="text" />
                                </div> -->
                                    <div id="form2" class="mt-3" style="display:none">
                                        <input name="dp" type="text" style="font-size: 20px;" placeholder="DP harus 50%" required value=" <?= ($bayar->harga + $bayar->harga_sesi + $bayar->harga_dekorasi) * (50 / 100) ?>" />
                                    </div>
                                </div> <br>
                                <li>Upload Bukti Transfer <img src="img/paypal.jpg" alt=""></li>
                                <input type="file" name="bukti_transfer" required>
                            </ul>
                            <button type="submit">Bayar Sekarang!</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Cart Total Page End -->
    <!-- Logo Section End -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(":radio.rad").click(function() {
                $("#form1, #form2").hide(1000)
                if ($(this).val() == "Lunas") {
                    $("#form2").hide(1000);
                } else if ($(this).val() == "DP") {
                    $("#form2").show(1000);
                }
            });
        });
    </script>
    <?php $this->load->view('element/footer') ?>
</body>

</html>