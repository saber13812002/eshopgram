<?php
$Mypersonalinfo=array();
if (isset($this->Mypersonalinfo )) $Mypersonalinfo= $this->Mypersonalinfo;

?>

        <content>
            <div class="mycontainer">
                <div class="container">
                    <div class="Alldiv">
                        <div class="row">
                            <div class="rtl font">
                                <div style="margin:0px auto;width:50%">
                                    <div style="text-align:center">
                                        <img style="width:130px;opacity:0.3" src="Image/Mail-Password-icon.png" />
                                        <h4>›—«„Ê‘Ì —„“ ⁄»Ê—</h4>

                                        <div style="text-align:center;margin-top:35px;">
                                            <lable> Å”  «·ò —Ê‰Ìò (<?php  echo $Mypersonalinfo[0]['email']; ?>)</lable>
                                            <form action="<?php echo URL ?>login/forget_password" method="post" onsubmit="return mypasswordmatch()" id="register_form">
                                           
                                                <center>
                                                    <input style="margin-top: 15px; margin-bottom: 15px;width: 50%;height: 30px;" type="email" name="pemail"  />
                                                </center>

                                                <button type="submit"   name="thecmd" value="<?php echo  CMD_RESET_PASSWORD?>" class="btn btn-info" style="width:100px;margin:0px 3px 3px 0px">«—”«·</button>
                                                <div class="g-recaptcha" data-sitekey="<? echo RECAPTCHA_VALUE; ?>"></div>
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