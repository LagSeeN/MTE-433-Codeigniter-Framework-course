<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php $this->load->view('watchshop/inc/title')?>
</head>

<body>

    <?php $this->load->view('watchshop/inc/header')?>

    <main>

        <?php //$this->load->view('watchshop/index-slide') ?>

        <!--? Popular Items Start -->
        <div class="popular-items section-padding30">
            <div class="container-fluid">
                <!-- Section tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle text-center">
                            <h2><?=lang('popular')?> (<?=$total_rows?>)</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($products as $product) {?>
                    <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <?php
$filepath = "product/pro_{$product->pro_id}01.jpg";
    if (is_file($filepath)) {
        ?>
                                <img src="<?=base_url($filepath)?>" alt="">
                                <?php }?>
                                <div class="img-cap">
                                    <span><?=lang('addtocart')?></span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3>
                                    <?php
                                    $pro_name = $lang == 'TH' ? $product->pro_name_th : $product->pro_name_en;
                                    // $url = base_url("Home/productDetail/$product->pro_id")
                                    $url = "$pro_name"."-p".$product->pro_id;
                                    ?>
                                    <a href="<?=base_url($url)?>" target="_blank">
                                        <?=$lang == 'TH' ? $product->pro_name_th : $product->pro_name_en;?>
                                    </a>
                                </h3>
                                <span><?=number_format($product->pro_price, 0)?>.-</span>
                            </div>
                        </div>
                    </div>
                    <?php }?>

                </div>
                <!-- Button -->
                <div class="row justify-content-center">
                    <div class="room-btn pt-70">
                        <?=$links?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Items End -->

        <?php //$this->load->view('watchshop/index-condition') ?>
    </main>
    <?php $this->load->view('watchshop/inc/footer')?>

    <?php $this->load->view('watchshop/inc/script')?>
    <?php $this->load->view('watchshop/inc/css')?>

</body>

</html>