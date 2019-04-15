<?php require("LoginHeader.php"); ?>
<?php
if (isset($this->error_msg)) {
    echo '<div style="text-align: center;margin-top: 10px;" class="alert alert-danger fade in font">';
    echo $this->error_msg;
    echo '</div>';
}
?>
<div class="login-logo">
    <a href="<?php echo URL; ?>">
        <h4 class="logo">ورود</h4>
    </a>
</div>
<div class="login-form rtl">
    <form action="<?php echo URL; ?>login" method="post">
        <input type="hidden" name="referrer" value="<?php echo $_REQUEST['referrer'] ?>" >
        <div class="form-group">
            <label for="email">ایمیل</label>
            <input type="email" name="email"  autocomplete="off" value='' class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="pwd">رمز عبور</label>
            <input type="password"  name="password" autocomplete="off" value='' class="form-control" placeholder="Password">
        </div>
        <div class="checkbox">
            <label>

            </label>
            <label class="pull-right">
                <a href="<?php echo URL ?>login/forget_password">فراموشی رمز عبور</a>
            </label>

        </div>
        <button type="submit"  name="thecmd" value="<?php echo CMD_ENTER ?>" class="btn btn-success btn-flat m-b-30 m-t-30">ورود</button>
        <div style="margin-bottom:40px">

        </div>
        <div class="register-link m-t-15 text-center" style="margin-top: 20px">
            <p>قبلا ثبت نام نکرده اید؟   <a href="<?php echo URL; ?>register"> ثبت نام </a></p>
        </div>
    </form>
</div>
</div>
</div>
</div>







<?php require("LoginFooter.php"); ?>
   