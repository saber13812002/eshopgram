<?php

/* Gregorian & Jalali (Hijri_Shamsi,Solar) date converter Functions
Copyright(C)2015 JDF.SCR.IR : [ http://jdf.scr.ir/jdf ] version 2.60
--------------------------------------------------------------------
1461 = 365*4 + 4/4   &  146097 = 365*400 + 400/4 - 400/100 + 400/400
12053 = 365*33 + 32/4    &    36524 = 365*100 + 100/4 - 100/100  
  
gregorian_to_jalali(2011,2,11);// خروجی: array(1389,11,22);
gregorian_to_jalali(2011,2,11,' / ');// خروجی: 1389 / 11 / 22
 
 *    */
class dateconverter {

    function __construct() {
        
    }


 public static function gregorian_to_jalali($gy,$gm,$gd,$mod=''){
 /*  $gy = intval($gy);
   $gm = intval($gm);
   $gd = intval($gd);
  * */
 $g_d_m=array(0,31,59,90,120,151,181,212,243,273,304,334);
 $jy=($gy<=1600)?0:979;
 $gy-=($gy<=1600)?621:1600;
 $gy2=($gm>2)?($gy+1):$gy;
 $days=(365*$gy) +((int)(($gy2+3)/4)) -((int)(($gy2+99)/100)) 
+((int)(($gy2+399)/400)) -80 +$gd +$g_d_m[$gm-1];
 $jy+=33*((int)($days/12053)); 
 $days%=12053;
 $jy+=4*((int)($days/1461));
 $days%=1461;
 $jy+=(int)(($days-1)/365);
 if($days > 365)$days=($days-1)%365;
 $jm=($days < 186)?1+(int)($days/31):7+(int)(($days-186)/30);
 $jd=1+(($days < 186)?($days%31):(($days-186)%30));
 return($mod=='')?array($jy,$jm,$jd):$jy.$mod.$jm.$mod.$jd;
}

public static function jalali_to_gregorian($jy,$jm,$jd,$mod=''){
 $gy=($jy<=979)?621:1600;
 $jy-=($jy<=979)?0:979;
 $days=(365*$jy) +(((int)($jy/33))*8) +((int)((($jy%33)+3)/4)) 
+78 +$jd +(($jm<7)?($jm-1)*31:(($jm-7)*30)+186);
 $gy+=400*((int)($days/146097));
 $days%=146097;
 if($days > 36524){
  $gy+=100*((int)(--$days/36524));
  $days%=36524;
  if($days >= 365)$days++;
 }
 $gy+=4*((int)(($days)/1461));
 $days%=1461;
 $gy+=(int)(($days-1)/365);
 if($days > 365)$days=($days-1)%365;
 $gd=$days+1;
 foreach(array(0,31,(($gy%4==0 and $gy%100!=0) or ($gy%400==0))?29:28 
,31,30,31,30,31,31,30,31,30,31) as $gm=>$v){
  if($gd<=$v)break;
  $gd-=$v;
 }
 return($mod=='')?array($gy,$gm,$gd):$gy.$mod.$gm.$mod.$gd; 
}

}