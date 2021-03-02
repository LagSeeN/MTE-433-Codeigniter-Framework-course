<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php $this->load->view('watchshop/inc/title')?>
</head>

<body>
    <?php $this->load->view('watchshop/inc/header')?>
    <main>

        <!--================Single Product Area =================-->
        <div class="product_image_area">
            <?echo $calendar ?>
        </div>
        <!--================End Single Product Area =================-->

    </main>
    <?php $this->load->view('watchshop/inc/footer')?>

    <?php $this->load->view('watchshop/inc/script')?>
    <?php $this->load->view('watchshop/inc/css')?>

</body>

</html>