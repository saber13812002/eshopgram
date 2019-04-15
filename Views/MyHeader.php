
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $this->datas['PARTS'][0]['seo_title'] ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo $this->datas['PARTS'][0]['seo_descriptions'] ?>"/>
        <meta name="keywords"    content="<?php echo $this->datas['PARTS'][0]['seo_keywords'] ?>"/>
        <!--===============================================================================================-->	
        <link href="<?php echo URL ?>Views/View/css/fontiran.css" rel="stylesheet">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="<?php echo URL ?>Views/themes/default/Assets/images/icons/favicon.png"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>Views/themes/default/Assets/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>Views/themes/default/Assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>Views/themes/default/Assets/fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>Views/themes/default/Assets/fonts/linearicons-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>Views/themes/default/Assets/vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>Views/themes/default/Assets/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>Views/themes/default/Assets/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>Views/themes/default/Assets/vendor/select2/select2.min.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>Views/themes/default/Assets/vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>Views/themes/default/Assets/vendor/slick/slick.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>Views/themes/default/Assets/vendor/MagnificPopup/magnific-popup.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>Views/themes/default/Assets/vendor/perfect-scrollbar/perfect-scrollbar.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>Views/themes/default/Assets/css/util.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>Views/themes/default/Assets/css/main.css">
        <!--===============================================================================================-->
    </head>
    <body class="animsition">

        <!-- Header -->
        <header>
            <!-- Header desktop -->
            <div class="container-menu-desktop">
                <!-- Topbar -->
                <div class="top-bar">
                    <div class="content-topbar flex-sb-m h-full container">
                        <div class="left-top-bar">
                           <?php  echo $this->GetClientParameters['headerdsc'] ?>
                        </div>

                        <div class="right-top-bar flex-w h-full rtl"> 
                            
                           <?php foreach ($this->Mainmenus as  $value){ ?>                      
                            <a href="<?php echo $this->url . '/page/'.$value['url'] ?>" class="flex-c-m trans-04 p-lr-25"> 
                               <?php echo $value['seo_title'] ?>
                            </a>                            
                           <?php } ?>

                        </div>
                    </div>
                </div>

                <div class="wrap-menu-desktop rtl">
                    <nav class="limiter-menu-desktop container">

                        <!-- Logo desktop -->		
                        <a href="<?php echo $this->url; ?>" class="logo">
<!--                            <img src="<?php echo URL ?>Views/themes/default/Assets/images/icons/logo-01.png" alt="IMG-LOGO">-->
                            <img  src="<?php echo $this->GetClientParameters['mainlogo'] ?>" alt="<?php echo $this->GetClientParameters['sitename'] ?>">
                           
                        </a>

                        <!-- Menu desktop -->
                        <div class="menu-desktop">
                            <ul class="main-menu">
                             

                                <?php foreach ($this->menus as $value) { ?>  
                                    <li>
                                        <a href="/product_list/category/<?php echo $value['menuid'] ?>/<?php echo $value['title'] ?>/"><?php echo $value['title'] ?></a>                       
                                    </li>
                                <?php } ?>

                                 <li class="label1" data-label1="ویژه">
                                    <a href="shoping-cart.html">تخفیفات</a>
                                </li>

                                
                            </ul>
                        </div>	

                        <!-- Icon header -->
                        <div class="wrap-icon-header flex-w flex-r-m">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                                <i class="zmdi zmdi-search"></i>
                            </div>

                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="0">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>

                            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                                <i class="zmdi zmdi-favorite-outline"></i>
                            </a>
                        </div>
                    </nav>
                </div>	
            </div>

            <!-- Header Mobile -->
            <div class="wrap-header-mobile">
                <!-- Logo moblie -->		
                <div class="logo-mobile">
                    <a href="<?php echo $this->url; ?>">  <img  src="<?php echo $this->GetClientParameters['mainlogo'] ?>" alt="<?php echo $this->GetClientParameters['sitename'] ?>"></a>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="0"> 
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                    <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                </div>

                <!-- Button show menu -->
                <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>
            </div>


            <!-- Menu Mobile -->
            <div class="menu-mobile rtl">
                <ul class="topbar-mobile">
                    <li>
                        <div class="left-top-bar">
                            <?php  echo $this->GetClientParameters['headerdsc'] ?>
                        </div>
                    </li>

                    <li>
                        <div class="right-top-bar flex-w h-full">
                             <?php foreach ($this->Mainmenus as  $value){ ?>                      
                            <a href="<?php echo $this->url . '/page/'.$value['url'] ?>" class="flex-c-m trans-04 p-lr-10"> 
                               <?php echo $value['seo_title'] ?>
                            </a>                            
                           <?php } ?>
                        </div>
                    </li>
                </ul>

                <ul class="main-menu-m">
                  <?php foreach ($this->menus as $value) { ?>  
                        <li>
                            <a href="/product_list/category/<?php echo $value['menuid'] ?>/<?php echo $value['title'] ?>/"><?php echo $value['title'] ?></a>                       
                        </li>


                    <?php } ?>
                    <li>
                        <a href="shoping-cart.html" class="label1 rs1" data-label1="ویژه">تخفیفات</a>
                    </li>

                    
                </ul>
            </div>

            <!-- Modal Search -->
            <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
                <div class="container-search-header">
                    <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                        <img src="<?php echo URL ?>Views/themes/default/Assets/images/icons/icon-close2.png"  alt="CLOSE">
                    </button>

                    <form class="wrap-search-header flex-w p-l-15">
                        <button class="flex-c-m trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <input class="plh3" type="text" name="search" placeholder="جستجو">
                    </form>
                </div>
            </div>
        </header>



        <!-- Cart -->
        <div class="wrap-header-cart js-panel-cart">
            <div class="s-full js-hide-cart"></div>

            <div class="header-cart flex-col-l p-l-65 p-r-25 rtl">
                <div class="header-cart-title flex-w flex-sb-m p-b-8">
                    <span class="mtext-103 cl2">
                        سبد شما
                    </span>
                    <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                        <i class="zmdi zmdi-close"></i>
                    </div>
                </div>
<!--                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $(".delbasketitem").click(function () {
                            alert(this.id);
                        });
                    });
                </script>-->
                <div class="header-cart-content flex-w js-pscroll" id="basketArea">
                    <?php if ($this->loadbasket) { ?>
                        <ul class="header-cart-wrapitem w-full" >
                            <?php foreach ($this->loadbasket as $value) { ?>

                                <li class="header-cart-item flex-w flex-t m-b-12">
                                    <div id="P-<?php echo $value['part_no'] ?>" class="delbasketitem header-cart-item-img">
                                        <img src="<?php echo $value['pic'] ?>" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt p-t-8">
                                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                            <?php echo $value['fa_name'] ?>
                                        </a>

                                        <span class="header-cart-item-info">
                                            <?php echo number_format($value['total_price']) ?>تعداد<?php
                                            echo number_format($value['qty']);
                                            $total += $value['total_price'] * $value['qty'];
                                            ?>
                                        </span>
                                    </div>
                                </li>
                            <?php } ?>

                        </ul>

                        <div class="w-full">
                            <div class="header-cart-total w-full p-tb-40">
                                مجموع : <?php echo number_format($total); ?>
                            </div>

                            <div class="header-cart-buttons flex-w w-full">
                                <a href="javascript:{}" id="sabt" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                                    ثبت سفارش
                                </a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div><?php echo MSG_EMPTY_BASKET ?> </div>
                    <?php } ?>
                </div>
            </div>


            <!--            delivery-->


            <div  class="header-cart flex-col-l p-l-65 p-r-25 rtl sdis dedis" >
                <div class="header-cart-title flex-w flex-sb-m p-b-8">
                    <span class="mtext-103 cl2">
                        اطلاعات شما
                    </span>
                    <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 delhide">
                        <i class="zmdi zmdi-long-arrow-return"></i>
                    </div>
                </div>

                <div class="header-cart-content flex-w js-pscroll" id="DeliveryArea" >

                </div>
            </div>

            <!--    -->
        </div>

