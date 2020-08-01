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
                        <tr>
                            <?php foreach ($cus as $c) { ?>
                                <td class="product-col">
                                    <img src="img/product/product-1.jpg" alt="">
                                    <div class="p-title">
                                        <h5><?= $c->nama_kategori ?><br>
                                            <p>Rp.<?= number_format($c->harga, 0, ',', '.')  ?></p>
                                        </h5>
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
                                    <p style="text-align: center; margin-right:10px;"><?= $c->status ?></p>
                                </td>
                                <td class="product-close">
                                    <button class="button btn-info form-control" data-toggle="modal" data-target="#modalRemove" type="button">Detail</button>
                                </td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="cart-btn">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="coupon-input">
                            <input type="text" placeholder="Enter cupone code">
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1 text-left text-lg-right">
                        <div class="site-btn clear-btn">Clear Cart</div>
                        <div class="site-btn update-btn">Update Cart</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shopping-method">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shipping-info">
                            <h5>Choose a shipping</h5>
                            <div class="chose-shipping">
                                <div class="cs-item">
                                    <input type="radio" name="cs" id="one">
                                    <label for="one" class="active">
                                        Free Standard shhipping
                                        <span>Estimate for New York</span>
                                    </label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" name="cs" id="two">
                                    <label for="two">
                                        Next Day delievery $10
                                    </label>
                                </div>
                                <div class="cs-item last">
                                    <input type="radio" name="cs" id="three">
                                    <label for="three">
                                        In Store Pickup - Free
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="total-info">
                            <div class="total-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Total</th>
                                            <th>Subtotal</th>
                                            <th>Shipping</th>
                                            <th class="total-cart">Total Cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="total">$29</td>
                                            <td class="sub-total">$29</td>
                                            <td class="shipping">$10</td>
                                            <td class="total-cart-p">$39</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <a href="#" class="primary-btn chechout-btn">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalRemove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hapus barang dari keranjang?
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger" href="<?= base_url('Customer/Produk/hapus_produk/' . $k->id_pemesanan) ?>">Hapus</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page Section End -->
    <!-- Logo Section End -->
    <?php $this->load->view('element/footer') ?>
</body>

</html>