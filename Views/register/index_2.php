<?php
$elist = null;
$data = array('email' => null, 'password' => null, 'National_Code'=>null , 'name' => null, 'lastname' => null, 'tel' => null, 'postalcode' => null, 'address' => null, 'mobile_no' => null, 'gender' => null);
$inputmsg = ' oninvalid=this.setCustomValidity(\'باید وارد شود\')" oninput="setCustomValidity(\'\') ';
if (isset($this->data)) { {
        $data = $this->data;
    }
}
?>

<div class="mycontainer">
    <div class="container">
        <div class="Alldiv">


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

                <div class="row">
                    <div class="rtl login-register-title">  ثبت نام  </div>

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

                    <div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="float:right">
                            <div class="padding" style="overflow-x: auto;direction: rtl" >
                                <form id="register_form"  action="<?php echo URL; ?>register" method="post" onsubmit="return mypasswordmatch()">
                                    <table class="table rtl">
                                        <tr>
                                            <td>
                                                <label> نام (فارسی) <span class="force-color">*</span></label>

                                                <input  type="text" name="name" pattern="[آ-یa-zA-Z_- ]{1,20}"  value="<?php echo $data['name']; ?>" oninvalid="this.setCustomValidity('نام  را وارد فرمایید')" oninput="setCustomValidity('')"  required   class="form-control" />

                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label>نام خانوادگی (فارسی) <span class="force-color">*</span></label>

                                                <input  type="text" name="lastname" pattern="[آ-یa-zA-Z_- ]{1,30}" value="<?php echo $data['lastname']; ?>" oninvalid="this.setCustomValidity('نام خانودگی را وارد فرمایید')" oninput="setCustomValidity('')" required class="form-control" />

                                            </td>
                                        </tr>

<!--                                        <tr>
                                            <td>
                                                <label> جنسیت<span class="force-color">*  </span></label>

                                                <input type="radio" name="gender" value="0" required> زن
                                                <input type="radio" name="gender" value="1" required> مرد
                                            </td>
                                        </tr>-->

                                        <tr>
                                            <td>
                                                <label>تلفن همراه<span class="force-color">*</span></label>

                                                <input  type="text" name="mobile_no" pattern="[0-9]{11,11}" placeholder="مثال:09121234567"  value="<?php echo $data['mobile_no']; ?>"  oninvalid="this.setCustomValidity('شماره موبایل را وارد فرمایید')" oninput="setCustomValidity('')" required class="form-control" />


                                            </td>
                                        </tr>

<!--                                        <tr>
                                            <td>
                                                <label>کد ملی<span class="force-color">*</span></label>

                                                <input type="text" name="national_code" value="<?php echo $data['National_Code']; ?>" pattern="[0-9]{10,10}" oninvalid="this.setCustomValidity('کد ملی را وارد فرمایید')" oninput="setCustomValidity('')" required class="form-control" />

                                            </td>
                                        </tr>-->

                                        <tr>
                                            <td>
                                                <label>پست الکترونیک (ایمیل) <span class="force-color">*</span></label>

                                                <input type="email" name="email" value="<?php echo $data['email']; ?>" oninvalid="this.setCustomValidity('آدرس ایمیل را وارد فرمایید')" placeholder="مثال:example@gmail.com" oninput="setCustomValidity('')" required class="form-control" />

                                            </td>
                                        </tr>




                                        <tr>
                                            <td>
                                                <label>کلمه عبور<span class="force-color">*</span></label>


                                                <input type="password" id="password" name="password"  pattern="[a-zA-Z0-9_-]{6,30}" placeholder="حداقل 6 کاراکتر" required  class="form-control" />

                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label>تکرار کلمه عبور<span class="force-color">*</span></label>


                                                <input type="password" id="password2"  name="password2"  pattern="[a-zA-Z0-9_-]{6,30}" placeholder="حداقل 6 کاراکتر" required class="form-control" />

                                            </td>
                                        </tr>
                                        <tr>

                                            <td colspan="1"  >
                                                <div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_VALUE; ?>"></div>
                                            </td>
                                        </tr>                                
                                        <tr>

                                            <td style="float:right">



                                                <button  formmethod="post"  type="submit" name="thecmd" value="<?php echo CMD_REGISTER; ?>"  class="btn btn-success input-lg col-lg-3" style="width:120px">ثبت نام</button>

                                            </td>
                                        </tr>


                                    </table>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 hidden-sm hidden-xs rtl" style="margin-top:100px">
                            <p><img class="icon icon-return-policy" src="<?php echo URL; ?>Views/View/Image/35x35 px-06.png" />7 روز ضمانت بازگشت</p>
                            <p> <img class="icon icon-return-policy" src="<?php echo URL; ?>Views/View/Image/35x35 px-09.png" />پرداخت در محل</p>
                            <p><img class="icon icon-return-policy" src="<?php echo URL; ?>Views/View/Image/35x35 px-07.png" />ضمانت اصالت کالا</p>
                            <p><img class="icon icon-return-policy" src="<?php echo URL; ?>Views/View/Image/35x35 px-10.png" />تحویل اکسپرس</p>
                            <p><img class="icon icon-return-policy" src="<?php echo URL; ?>Views/View/Image/35x35 px-08.png" />تضمین بهترین قیمت</p>

                        </div>
                    </div>
                </div>



<?php } ?>

        </div>
    </div>
</div>
<?php
if ($elist != null) {
    ?>
    <script>
        
        open_mymodal("MSGModal","ثبت با موفقیت انجام شد");
        //alert(1);
    </script>
    <?php
}
?>  
<style>




    @media screen and (min-width: 992px) {    
        .form-control {
            width: 50%;
        }
        .padding{
            padding: 30px;
        }
    }
    @media screen and (max-width: 991px) { 
        .form-control {
            width: 100%;
        }
    }


    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
        border-top: unset;
        padding: 5px;
        vertical-align: middle;
    }

    .td{
        vertical-align:middle
    }

</style>
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