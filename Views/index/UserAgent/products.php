<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo URL ?>Views/index/UserAgent/style.css">
    <script src="https://khanehvaashpazkhaneh.com/Views/View/Scripts/jquery-1.9.1.min.js"></script> 
    <script>
        function Add2cart(id){
         alert(id);

            $.ajax({
                type: 'POST',
                contenttype: 'application/json',
                url: '<?php echo URL ?>'+'cart/add',
                data: {"id": id
                },
                beforeSend: function () {
                    //$("#pparameters").html("<br><img style='display: block;margin: 0 auto;clear:both;' src='/public/images/loading.gif' />");
                },
                success: function (response) {
                    //$("#pparameters").html(response);
                    alert(response);

                }

            }, 'json');
        }
        
    </script>    
</head>

<body style="background-color:#fafafa">
    <div class="container-fluid">
        <div class="d-flex flex-row justify-content-space-around align-items-center header">
            <div class="left-header">
                <div class="flex-row-reverse">
                    <ul class="nav flex-row-reverse flex-nowrap" style="height:30px">
                        <li id="logo-title" class="nav-item ml-3">
                            <a class="nav-link" href="#"></a>
                        </li>
                        <li id="logo" class="nav-item ml-3">
                            <a class="nav-link" href="#"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="center-header  d-none d-sm-block ">
                <div class="input-group">
                    <input class="form-control" placeholder="Search">
                    <div class="input-group-addon"><i class="fa fa-search"></i></div>
                </div>
            </div>
            <div class="d-flex justify-content-right right-header">
                <div class="flex-row-reverse">
                    <ul class="nav flex-row-reverse flex-nowrap" style="height:30px">
                        <li id="user" class="nav-item ml-3">
                            <a class="nav-link" href="#"></a>
                        </li>
                        <li id="like" class="nav-item ml-3">
                            <a class="nav-link" href="#"></a>
                        </li>
                        <li id="cart" class="nav-item ml-3">
                            <a class="nav-link" href="#"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div style="height:1px;width:100%;background-color: #eee"></div>
        </div>

        <div class="d-flex pt-5 justify-content-center flex-wrap " >
            <div class="row shadow-sm p-3 mb-5 bg-white rounded justify-content-center" >
            <div class="m-0" style="background-color: white"> 
                    <div id="demo" class="carousel slide " data-ride="carousel">

                            <!-- Indicators -->
                            <ul class="carousel-indicators ">
                              <li data-target="#demo" data-slide-to="0" class="active"></li>
<!--                              <li data-target="#demo" data-slide-to="1"></li>
                              <li data-target="#demo" data-slide-to="2"></li>-->
                            </ul>
                            
                            <!-- The slideshow -->
                            <div class="carousel-inner ">
                              <div class="carousel-item active ">
                                  <img class="img-responsive" src="<?php echo $this->UserPosts[0]['media_url'] ?>" alt="Los Angeles" width="300px" height="300px" >
                              </div>
<!--                              <div class="carousel-item">
                                <img src="<?php echo URL ?>Views/index/UserAgent/pic2.jpg" alt="Chicago" width="1100" height="500">
                              </div>
                              <div class="carousel-item">
                                <img src="<?php echo URL ?>Views/index/UserAgent/pic3.jpg" alt="New York" width="1100" height="500">
                              </div>-->
                            </div>
                            
                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                              <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                              <span class="carousel-control-next-icon"></span>
                            </a>
                          </div>
            
            </div>
            <div class=" p-2  d-flex justify-content-center " style="width:300px;max-height:550px;font-size: 12px;;background-color: white">
                <div class="p-4 justify-content-center">
                <div class="row">crate&barell</div>
                <hr>
                <div class="row ">
                        crateandbarrel
                        It's that time of year: flowers are blooming, people are starting to emerge from their wintery cocoons and ... we're still in the kitchen baking cookies. 🍪🌸🐝 This spring, we're switching it up with baking ideas inspired by our new floral cookie cutters and cupcake pan on the latest #CrateBlog at the link in bio. #CrateStyle #Baking #BakingFun
                </div>
                <div class="row">2</div>
                <hr>
                <div class="row">3</div>
                <hr>
                <div class="row">comment</div>                
            </div>
            </div>
            </div>
          </div>

        
                    <div id="home" class="container tab-pane active">
                <div class="d-flex justify-content-center w-100">
            <div id="home" class="container tab-pane active">
                
                <?php $i=1; $break=0; foreach ($this->UserPosts as $value) {  ?>
                <?php  if ( $i==1 || $break==0 ) { $break=1; ?>
                <div class="d-flex  flex-nowrap justify-content-center" style="width:100%">
                <?php } ?>
<!--                        <div class="d-flex " style="margin:2px">
                            <a href="<?php echo $this->useragent['website_url'] ?>products/?id=<?php echo $value['supplier_id'] ?>" >
                            <img class="img-grid" src="<?php echo $value['media_url'] ?>" alt="Card image" styel="">
                            </a>
                            <div>
                                <a href="javascript:{}" onclick="Add2cart('<?php echo $value['supplier_id'] ?>')">افزودن به سبد خرید</a>
                                <button type="button" class="btn btn-primary">Primary</button>
                            </div>
                        </div>-->

                      <div class="card w-25 h-25" >
                          <?php $img = $_SERVER['DOCUMENT_ROOT'].'/mgpApp/Upload/image/'.$value['imagename']; ?> 
                          <?php if(file_exists($img)) 
                          {                              
                              ?>
                          <img class="img-responsive" src="<?php echo URL.'/mgpApp/Upload/image/'.$value['imagename']; ?>" alt="Card image" style="width:100%">                          
                          <?php }else { ?>
                            <img class="img-responsive" src="<?php echo $value['media_url'] ?>" alt="Card image" style="width:100%">
                          <?php } ?>
                            <hr>
                        <div class="card-body">
                          <h4 class="card-title d-flex flex-row-reverse"><?php echo $value['name'] ?></h4>
                          <p class="card-text"></p>
                          <div class="d-flex justify-content-between flex-row-reverse">
                            <div>قیمت</div>
                            <div class="card-text"><?php echo $value['price'] ?></div>  
                          </div>
                          <div class="d-flex justify-content-center pt-2">
                          <button class="btn btn-success" href="javascript:{}" onclick="Add2cart('<?php echo $value['supplier_id'] ?>')"><?php echo CMD_ADD2BASKET ?></button>                                  
                          </div>
                          
                        </div>
                      </div>  


                <?php if ( fmod($i,3) == 0 ) { ?>
                </div>
                <?php $break=0;} $i++; ?>
                
                <?php } ?>

            </div>



            </div>
        
                    </div>

       
       <div class="d-flex pt-5 justify-content-center">
           <ul class="nav">
               <li class="nav-item">
                    <a class="nav-link" href="#">Link 1</a>
               </li>
               <li class="nav-item"> 
                    <a class="nav-link" href="#">Link 2</a>
               </li>
           </ul>
        </div>
    </body>
    
    
    </html>