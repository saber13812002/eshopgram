<?php require("Views/login/LoginHeader.php"); ?>
<div class="login-logo">
    <a href="<?php echo URL; ?>">
        <h4 class="logo">کد تایید</h4>
    </a>
</div>

<div class="login-form rtl">
    <div class="text-center">
        <span class="dot "></span>
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <form id="register_form"  action="<?php echo URL; ?>register" method="post" onsubmit="return mypasswordmatch()">
        <div class="form-group">
            <label>کد تایید</label>
            <input type="number" id="" name="code"   required class="form-control">
        </div>
        <div class="checkbox">
            <label>

            </label>
        </div>
        <a href="<?php echo URL; ?>register/choose_theme" formmethod="post"  type="submit" name="thecmd" value="<?php echo CMD_REGISTER; ?>" class="btn btn-primary btn-flat m-b-30 m-t-30">ادامه</a>
        <div style="margin-bottom:40px"></div>
        <div class="text-center" ><p id="timer"></p></div>
        <div><p>در صورت ارسال نشدن کد تایید پس از 5 دقیقه روی <a href="<?php echo URL; ?>register/verification" style="color: red">ارسال مجدد</a> کلیک کنید</p></div>
    </form>
</div>
</div>
</div>
</div>    

<script>

    var time_in_minutes = 5;
    var current_time = Date.parse(new Date());
    var deadline = new Date(current_time + time_in_minutes * 60 * 1000);


    function time_remaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {'total': t, 'days': days, 'hours': hours, 'minutes': minutes, 'seconds': seconds};
    }
    function run_clock(id, endtime) {
        var clock = document.getElementById(id);
        function update_clock() {
            var t = time_remaining(endtime);
            clock.innerHTML = t.minutes + ':' + t.seconds;
            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }
        update_clock(); // run function once at first to avoid delay
        var timeinterval = setInterval(update_clock, 1000);
    }
    run_clock('timer', deadline);
</script>




<?php require("Views/login/LoginFooter.php"); ?>