<?php require("Views/login/LoginHeader.php"); ?>
<div class="login-logo">
    <a href="<?php echo URL; ?>">
        <h4 class="logo">ثبت موفق</h4>
    </a>
</div>

<div class="login-form rtl">
    <div class="text-center">
        <span class="dot "></span>
        <span class="dot "></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot active"></span>
    </div>
    <form id="register_form"  action="<?php echo URL; ?>register" method="post" onsubmit="return mypasswordmatch()">
        <div class="form-group text-center">
            <img class="img-responsive" src="<?php echo URL; ?>public/images/ok.png" alt=""/>
            <h6>فروشگاه شما با موفقیت ثبت شد برای ورود کلیک کنید</h6>
        </div>
        <div class="checkbox">
            <label>

            </label>
        </div>
        <a href="<?php echo URL; ?>login" formmethod="post"  type="submit" name="thecmd" value="<?php echo CMD_REGISTER; ?>" class="btn btn-primary btn-flat m-b-30 m-t-30">ادامه</a>
        <div style="margin-bottom:40px">

        </div>
    </form>
</div>
</div>
</div>
</div>    
<?php require("Views/login/LoginFooter.php"); ?>

