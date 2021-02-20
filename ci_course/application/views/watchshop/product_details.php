<!doctype html>
<html lang="zxx">

<head>
    <?php $this->load->view('watchshop/inc/title')?>
</head>


<body>

    <?php $this->load->view('watchshop/inc/header')?>
    <main>
        <!--================Single Product Area =================-->
        <div class="product_image_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="product_img_slide owl-carousel">
                            <div class="single_product_img">
                                <?php
                                $filepath = "product/pro_{$product->pro_id}01.jpg";
                                if (is_file($filepath)) {?>
                                <img src="<?=base_url($filepath)?>" alt="#" class="img-fluid">
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="single_product_text text-center">
                            <h3><?=$lang == 'TH' ? $product->pro_name_th : $product->pro_name_en?></h3>
                            <p>
                                <?=$lang == 'TH' ? $product->pro_desc_th : $product->pro_desc_en?>
                            </p>
                            <div class="card_area">
                                <?php
                                $attr = array(
                                    'method'=>'post',
                                    'if'=>'frmcart',
                                    'name'=>'frmcart',
                                    'class'=>'');
                                $hidden = array(
                                    'pro_id'=>$product->pro_id,
                                    'pro_price'=>$product->pro_price,

                                );
                                echo form_open('WebCart/add',$attr,$hidden);
                                ?>
                                <div class="product_count_area">
                                    <p><?=lang('quantity')?></p>
                                    <div class="product_count d-inline-block">
                                        <span class="product_count_item inumber-decrement"> <i
                                                class="ti-minus"></i></span>
                                        <input class="product_count_item input-number" type="text" name="qty" value="1"
                                            min="0" max="10">
                                        <span class="product_count_item number-increment"> <i
                                                class="ti-plus"></i></span>
                                    </div>
                                    <p>฿ <?=number_format($product->pro_price, 2)?></p>
                                </div>
                                <div class="add_to_cart">
                                    <button type="sumbit" class="btn_3"><?=lang('add-to-cart')?></button>
                                </div>
                                <?php echo form_close();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Single Product Area =================-->
    </main>
    <?php $this->load->view('watchshop/inc/footer')?>

    <?php $this->load->view('watchshop/inc/script')?>
    <?php $this->load->view('watchshop/inc/css')?>


</body>

</html>