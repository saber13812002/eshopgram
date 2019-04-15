<?php require("Views/login/LoginHeader.php"); ?>

<div class="login-logo">
    <a href="<?php echo URL; ?>">
        <h4 class="logo">انتخاب قالب</h4>
    </a>
</div>

<div class="login-form rtl">
    <div class="text-center">
        <span class="dot "></span>
        <span class="dot "></span>
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
    <div class="text-center"><label>انتخاب قالب</label></div>
    <form id="register_form"  action="<?php echo URL; ?>register" method="post" onsubmit="return mypasswordmatch()">

        <div class="form-group">
            <div class="col-md-6 col-sm-12 thememargin">
                <img src="http://saminta.com/public/images/theme/theme_1.jpg" alt="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-sm-12 thememargin">
                <img src="http://saminta.com/public/images/theme/theme_2.png" alt="">
            </div>
        </div>




        <a style="margin-top: 40px"  href="<?php echo URL; ?>register/domain" formmethod="post"  type="submit" name="thecmd" value="<?php echo CMD_REGISTER; ?>" class="btn btn-primary btn-flat m-b-30 m-t-30">ادامه</a>
        <div style="margin-bottom:40px"></div>

    </form>
</div>
</div>
</div>
</div>




<?php require("Views/login/LoginFooter.php"); ?>