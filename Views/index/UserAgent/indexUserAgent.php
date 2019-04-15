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
    <link rel="stylesheet" href="<?php echo URL ?>Views/index/UserAgent/style.css?v=2">

</head>

<body style="background-color:#fafafa">
    <div class="container-fluid pl-0 pr-0" >
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
        <div class="d-flex justify-content-center w-100">
            <div class="d-flex justify-content-center pt-2" style="min-height: 200px;width: 35%">
                <img class="rounded-circle img-logo mt-1" alt="Cinque Terre"
                    src="https://scontent-frx5-1.cdninstagram.com/vp/9d2f2d2fe5b3dec95059f40503a29b41/5D0D9EF6/t51.2885-19/11098350_355154264687546_916378869_a.jpg?_nc_ht=scontent-frx5-1.cdninstagram.com">
            </div>
            <div class="pt-3" style="min-height: 200px;width:65%;">
                <div class="row h-25">
                    <ul class="nav flex-nowrap d-flex align-items-baseline">
                        <li class="nav-item">
                            <h1>Crate and Barrel</h1>
                        </li>
                        <li id="verified" class="nav-item ml-3 ">

                        </li>
                        <li class="nav-item ml-3">
                            <a class="nav-link" href="#">
                                <button type="button" class="btn btn-outline-secondary btn-sm">following</button>
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="row flex-nowrap pt-1">
                    <div> 3,678 posts </div>
                    <div class="pl-3"> 1.4m followers</div>
                    <div class="pl-3"> 436 following</div>
                </div>
                <div class="row pt-1">
                    <p>Crate and Barrel</p>
                    <p> Share photos with us by using #CrateStyle & @crateandbarrel for a chance to be featured!</p>
                    <p> Shop our feed: </p>
                    </p>
                </div>
                <div class="row">2</div>
            </div>

        </div>
        <div class="d-flex justify-content-center">
            <div style="height:1px;width:85%;background-color:#eee"></div>
        </div>
        <div class="d-flex justify-content-center">
            <div style="width:85%;">
                <ul class="nav nav-tabs justify-content-center d-flex" style="flex-flow: nowrap;">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">POSTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">IGTV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2">TAGGED</a>
                    </li>
                </ul>
            </div>
        </div> 
        <div class="row tab-content ">
            <div id="home" class="container tab-pane active">
                
                <?php $i=1; $break=0; foreach ($this->UserPosts as $value) {  ?>
                <?php  if ( $i==1 || $break==0 ) { $break=1; ?>
                <div class="d-flex  flex-nowrap justify-content-center" style="width:100%">
                <?php } ?>
                        <div class="d-flex " style="margin:2px">
                            <a href="<?php echo $this->useragent['website_url'] ?>products/?id=<?php echo $value['supplier_id'] ?>" >
                            <img class="img-grid" src="<?php echo $value['media_url'] ?>" alt="Card image" styel="">
                            </a>
                        </div>

                <?php if ( fmod($i,3) == 0 ) { ?>
                </div>
                <?php $break=0;} $i++; ?>
                
                <?php } ?>

            </div>
            <div id="menu1" class="container tab-pane fade"><br>
                <h3>Menu 1</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
            </div>
            <div id="menu2" class="container tab-pane fade"><br>
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam.</p>
            </div>
        </div>
</body>

</html>