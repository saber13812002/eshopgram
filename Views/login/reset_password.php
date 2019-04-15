<?php
$key = null;
if (isset($this->key))
$key =$this->key;
?>


<content>
        <content>
            <div class="mycontainer">
                <div class="container">
                    <div class="Alldiv">
                        <div class="row">
                            <div class="rtl font">
                                <div style="margin:0px auto;width:50%">
                                    <div style="text-align:center">
                                        <img style="width:130px;opacity:0.3" src="Image/232467-200.png" />
                                        <h4>بازیابی کلمه عبور</h4>

                                        <div style="text-align:center;margin-top:35px;">

                                            <form  action="<?php echo URL ?>login/reset_password" method="post" onsubmit="return mypasswordmatch()" id="register_form">
                                                <input type="hidden" name="key" value="<?php  echo $key; ?>"> 
                                                <lable> پست الکترونیک</lable>
                                                <center>
                                                    <input style="margin-top: 15px; margin-bottom: 15px;width: 50%;height: 30px;"  type="email" name="pemail" />
                                                </center>

                                                <lable> کلمه عبور جدید</lable>

                                                <center>
                                                    <input style="margin-top: 15px; margin-bottom: 15px;width: 50%;height: 30px;"  type="password" name="password1" />
                                                </center>

                                                <lable> تکرار کلمه عبور جدید</lable>

                                                <center>
                                                    <input style="margin-top: 15px; margin-bottom: 15px;width: 50%;height: 30px;" type="password" name="password2" />
                                                </center>

                                                <button  type="submit"   name="thecmd" value="<?php echo CMD_CHANGE_PASSWORD?>" class="btn btn-info" style="width:100px;margin:0px 3px 3px 0px">ارسال</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </content>
    </content>

<script>
function mypasswordmatch()
{
    var pass1 = $("#password").val();
    var pass2 = $("#password2").val();
    if (pass1 != pass2)
    {
        alert("کلمه عبور و تکرار آن متفاوت است!");
        return false;
    }
    else
    {
        $( "#register_form" ).submit();
    }
}
</script>


