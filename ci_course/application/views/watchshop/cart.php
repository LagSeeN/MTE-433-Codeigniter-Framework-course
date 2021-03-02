<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php $this->load->view('watchshop/inc/title') ?>
</head>

<body>
    <?php $this->load->view('watchshop/inc/header') ?>
    <main>

        <!--================Single Product Area =================-->
        <div class="product_image_areax">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <?php echo form_open('WebCart/edit' , array('method'=>'post')); ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <td>Del</td>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>Qty</td>
                                    <td></td>
                                </tr>
                                <?php foreach ($this->cart->contents() as $cart) {
                                    
                                 ?>
                                <tr>
                                    <td><a href="<?=base_url("WebCart/delete/$cart[rowid]")?>">Del</a></td>
                                    <td>
                                        <?php
                                    $filepath = "product/pro_{$cart["id"]}01.jpg";
                                    ?>
                                        <img src="<?=base_url($filepath) ?>" style="max-width:150px;" />
                                        <?=$lang=='EN'?$cart['options']['EN']:$cart['options']['TH'] ?>
                                    </td>
                                    <td><?=number_format($cart['price'],0)?></td>
                                    <td>
                                        <input type="text" name="qty[]" value="<?=$cart['qty']?>" maxlength='2'
                                            style="width:30px;">
                                        <input type="hidden" name="rowid[]" value="<?=$cart['rowid']?>">

                                    </td>
                                    <td align="right"><?=number_format($cart['qty']*$cart['price'],0)?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="4" align="right">Total : </td>
                                    <td align="right" style="border-bottom: 4px double #aaa;">
                                        <?=number_format($this->cart->total(),0) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="center">
                                        <input type="submit" name="btn-updatecart" id="btn-updatecart"
                                            class="btn btn-warning" value="Update Cart" />
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Single Product Area =================-->

    </main>
    <?php $this->load->view('watchshop/inc/footer') ?>

    <?php $this->load->view('watchshop/inc/script') ?>
    <?php $this->load->view('watchshop/inc/css') ?>

</body>

</html>