<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
    <div class="container rtl" style="font-family: IRANSANS">
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    دسته بندی ها
                </h4>

                <ul>
                    <?php foreach ($this->menus as $value) { ?>  
                        <li class="p-b-10">
                            <a href="/product_list/category/<?php echo $value['menuid'] ?>/<?php echo $value['title'] ?>/" class="stext-107 cl7 hov-cl1 trans-04">
                                <?php echo $value['title'] ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    خدمات مشتریان
                </h4>

                <ul>
                    
                     <?php foreach ($this->Footer as $value) { ?>  
                    <li class="p-b-10">
                        <a href="<?php echo $this->url.'/page/'.$value['url']; ?>" class="stext-107 cl7 hov-cl1 trans-04">
                            <?php echo $value['seo_title'] ?>
                        </a>
                    </li>
                     <?php } ?>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">

                <p class="stext-107 cl7 size-201">
                 <?php   echo $this->GetClientParameters['footerdsc'] ?>
                </p>

                <div class="p-t-27">
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16"> 
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16"> 
                        <i class="fa fa-telegram"></i>
                    </a>
                    <a href="https://www.aparat.com/IRANHandpan" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i> <img style="width: 26px;margin-top: -5px" src="<?php echo URL ?>Views/themes/default/Assets/images/icons/aparat_icon_color_black_32.png"  alt="aparat"></i>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                

             
            </div>
        </div>

        <div class="p-t-40">


            <p class="stext-107 cl6 txt-center">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                <br>
                قدرت داده شده توسط
                <a href="<?php echo URL ?>">ثمینتا<a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

            </p>
        </div>
    </div>
</footer>



<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>
<!--===============================================================================================-->	
<script src="<?php echo URL ?>Views/themes/default/Assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo URL ?>Views/themes/default/Assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo URL ?>Views/themes/default/Assets/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo URL ?>Views/themes/default/Assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo URL ?>Views/themes/default/Assets/vendor/select2/select2.min.js"></script>
<script>
                    $(".js-select2").each(function () {
                        $(this).select2({
                            minimumResultsForSearch: 20,
                            dropdownParent: $(this).next('.dropDownSelect2')
                        });
                    })
</script>
<!--===============================================================================================-->
<script src="<?php echo URL ?>Views/themes/default/Assets/vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo URL ?>Views/themes/default/Assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?php echo URL ?>Views/themes/default/Assets/vendor/slick/slick.min.js"></script>
<script src="<?php echo URL ?>Views/themes/default/Assets/js/slick-custom.js"></script>
<!--===============================================================================================-->
<script src="<?php echo URL ?>Views/themes/default/Assets/vendor/parallax100/parallax100.js"></script>
<script>
                    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="<?php echo URL ?>Views/themes/default/Assets/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
                    $('.gallery-lb').each(function () { // the containers for all your galleries
                        $(this).magnificPopup({
                            delegate: 'a', // the selector for gallery item
                            type: 'image',
                            gallery: {
                                enabled: true
                            },
                            mainClass: 'mfp-fade'
                        });
                    });
</script>
<!--===============================================================================================-->
<script src="<?php echo URL ?>Views/themes/default/Assets/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo URL ?>Views/themes/default/Assets/vendor/sweetalert/sweetalert.min.js"></script>
<script>
                    $('.js-addwish-b2, .js-addwish-detail').on('click', function (e) {
                        e.preventDefault();
                    });

                    $('.js-addwish-b2').each(function () {
                        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
                        $(this).on('click', function () {
                            swal(nameProduct, "به سبد اضافه شد", "success");

//                            $(this).addClass('js-addedwish-b2');
//                            $(this).off('click');
                        });
                    });

                    $('.js-addwish-detail').each(function () {
                        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

                        $(this).on('click', function () {
                            swal(nameProduct, "is added to wishlist !", "success");

                            $(this).addClass('js-addedwish-detail');
                            $(this).off('click');
                        });
                    });

                    /*---------------------------------------------*/

                    $('.js-addcart-detail').each(function () {
                        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
                        $('.container').on('click', '.js-addcart-detail', function () {
                            swal(nameProduct, "به سبد اضافه شد ", "success");
                        });
                    });

</script>
<!--===============================================================================================-->
<script src="<?php echo URL ?>Views/themes/default/Assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
                    $('.js-pscroll').each(function () {
                        $(this).css('position', 'relative');
                        $(this).css('overflow', 'hidden');
                        var ps = new PerfectScrollbar(this, {
                            wheelSpeed: 1,
                            scrollingThreshold: 1000,
                            wheelPropagation: false,
                        });

                        $(window).on('resize', function () {
                            ps.update();
                        })
                    });
</script>
<!--===============================================================================================-->
<script src="<?php echo URL ?>Views/themes/default/Assets/js/main.js"></script> 
</body>
</html>
