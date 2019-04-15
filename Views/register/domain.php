<?php require("Views/login/LoginHeader.php"); ?>
<div class="login-logo">
    <a href="<?php echo URL; ?>">
        <h4 class="logo">افزودن دامنه</h4>
    </a>
</div>

<div class="login-form rtl">
    <div class="text-center">
        <span class="dot "></span>
        <span class="dot "></span>
        <span class="dot"></span>
        <span class="dot active"></span>
        <span class="dot"></span>
    </div>
    <form id="register_form"  action="<?php echo URL; ?>register" method="post" onsubmit="return mypasswordmatch()">
        <div class="form-group">
            <label>دامنه</label>
            <input type="number" id="" name="code"   required class="form-control">
        </div>
        <div class="checkbox">
            <label>

            </label>
        </div>
        <a href="<?php echo URL; ?>register/successful_record" formmethod="post"  type="submit" name="thecmd" value="<?php echo CMD_REGISTER; ?>" class="btn btn-primary btn-flat m-b-30 m-t-30">ادامه</a>
        <div style="margin-bottom:40px">

        </div>
    </form>
</div>
</div>
</div>
</div>    
<?php require("Views/login/LoginFooter.php"); ?>

