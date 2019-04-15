<?php require("Views/login/LoginHeader.php"); ?>
<?php
$elist = null;
$data = array('email' => null, 'password' => null, 'National_Code' => null, 'name' => null, 'lastname' => null, 'tel' => null, 'postalcode' => null, 'address' => null, 'mobile_no' => null, 'gender' => null);
$inputmsg = ' oninvalid=this.setCustomValidity(\'باید وارد شود\')" oninput="setCustomValidity(\'\') ';
if (isset($this->data)) { {
        $data = $this->data;
    }
}
?>



<?php
if (isset($this->success)) {
    echo '<div class="rtl font">';
    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mag-style" style="text-align: center;min-height: 180px">';
    echo '<h3 style="color: green">';
    echo $this->success;
    echo '</h3>';
    echo '<a href="' . URL . 'login"> ورود به سیستم</a>';
    echo '</div>';
    echo '</div>';
}
?>
<?php
if (!isset($this->success)) {
    ?>


    <?php
    $elist = null;
    if (isset($this->errorlist)) {
        echo '<div class="alert alert-danger fade in font" style="text-align: center;margin-top: 10px;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
        foreach ($this->errorlist as $key => $value) {
            echo $this->errorlist[$key];
            $elist .= $this->errorlist[$key] . '<br>';
        }
        echo '</div>';
    }
    ?>






<?php } ?>

<?php
if ($elist != null) {
    ?>
    <script>

        open_mymodal("MSGModal", "ثبت با موفقیت انجام شد");
        //alert(1);
    </script>
    <?php
}
?>  

<script>
    function mypasswordmatch()
    {
        var pass1 = $("#password").val();
        var pass2 = $("#password2").val();
        if (pass1 != pass2)
        {
            alert("کلمه عبور و تکرار آن متفاوت است!");
            return false;
        } else
        {
            $("#register_form").submit();
        }
    }

</script>




<div class="login-logo">
    <a href="<?php echo URL; ?>">
        <h4 class="logo">عضویت</h4>
    </a>
</div>
<div class="login-form rtl">

    <div class="text-center">
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>


    <form id="register_form"  action="<?php echo URL; ?>register" method="post" onsubmit="return mypasswordmatch()">
        <div class="form-group">
            <label>نام و نام خانوادگی</label>
            <input type="text" name="name" pattern="[آ-یa-zA-Z_- ]"  value="<?php echo $data['name']; ?>" oninvalid="this.setCustomValidity('نام  را وارد فرمایید')" oninput="setCustomValidity('')"  required class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <label>ایمیل</label>
            <input type="email" name="email" value="<?php echo $data['email']; ?>" oninvalid="this.setCustomValidity('آدرس ایمیل را وارد فرمایید')"  oninput="setCustomValidity('')" required class="form-control">
        </div>
        <div class="form-group">
            <label>رمز عبور</label>
            <input type="password" id="password" name="password"  pattern="[a-zA-Z0-9_-]{6,30}" placeholder="حداقل 6 کاراکتر" required class="form-control" placeholder="Password">
        </div>
        <div class="checkbox">
            <label>

            </label>
        </div>
        <a href="<?php echo URL; ?>register/verification" formmethod="post"  type="submit" name="thecmd" value="<?php echo CMD_REGISTER; ?>" class="btn btn-primary btn-flat m-b-30 m-t-30">ادامه</a>
        <div style="margin-bottom:40px">

        </div>
          <div class="register-link m-t-15 text-center" style="margin-top: 20px">
            <p>قبلا ثبت نام کرده اید؟   <a href="<?php echo URL; ?>login"> ورود </a></p>
        </div>
    </form>
</div>
</div>
</div>
</div>

<?php require("Views/login/LoginFooter.php"); ?>