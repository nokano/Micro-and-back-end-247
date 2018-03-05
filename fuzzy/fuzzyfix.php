<?php
function suhurendah ($suhu){
    if($suhu<=24){
        return 1;
    }
    else if ($suhu>24 && $suhu <26){
        return round(((26-$suhu)/(26-24)),3);
    }
    else{
        return 0; 
  }
    
}
function suhusedang ($suhu){
    if ($suhu >24 && $suhu <26){
        return round((($suhu-24)/(26-24)),3);        
    }
    else if ($suhu >=26 && $suhu <=28){
        return 1;
    }
    elseif ($suhu >28 && $suhu <31) {
        return round(((31-$suhu)/(31-28)),3);
    }
    else{
        return 0;
    }
}
function suhutinggi ($suhu){
    if ($suhu >28 && $suhu <30){
        return round((($suhu-28)/(30-28)),3);
    }
    else if($suhu >= 30){
        return 1;
    }
 else {
       return 0;    
    }
}
function kelembapanrendah($kel){
    if($kel <=55){
        return 1;
    }
    else if ($kel>55 && $kel<60){
        return round(((60-$kel)/(60-55)),3);
    }
 else {
      return 0;    
    }
}
function kelembapansedang($kel){
    if($kel >55 && $kel <60){
        return round((($kel-55)/(60-55)),3);
    }
    else if($kel>=60 && $kel<=80){
        return 1;
    }
    else if ($kel>80 && $kel<83){
        return round(((83-$kel)/(83-80)),3);
    }
 else {
        return 0;    
    }
}
function kelembapantinggi($kel){
    if($kel > 80 && $kel < 84){
        return round((($kel-80)/(84-80)),3);
    }
    elseif ($kel >=84) {
        return 1;
    }
    else {
        return 0;
    }
}
function tekananrendah ($tek){
  if(($tek <=1008)){
      return 1;
  }
  else if ($tek >1008 && $tek < 1010){
      return round(((1010-$tek)/(1010-1008)),3);
  }
  else {
      return 0;
  }  
}
function tekanantinggi ($tek){
  if ($tek > 1000 && $tek <1007){
      return round((($tek-1000)/(1007-1000)),3);
  }
  else if ($tek>=1007){
      return 1;
  }
 else {
   return 0;   
   }
}
function hujan($der){
    return (1*$der);
}
function awan($der){
    return ((1*$der)+1);
}
function cerah($der){
    return ((1*$der)+2);
}
function mamdani ($suhu,$kel,$tek,&$prediksi){
//pemetaan derajat fungsi anggota sesua function di atas
suhurendah($suhu);
suhusedang($suhu);
suhutinggi($suhu);
kelembapanrendah($kel);
kelembapansedang($kel);
kelembapantinggi($kel);
tekananrendah($tek);
tekanantinggi($tek);
//inisiasi nilai max dari setiap outpyt
$atas=0;$bawah=0;
$maxh=0;
$maxa=0;
$maxc=0;
//rule base
if(suhurendah($suhu)>0&&kelembapantinggi($kel)>0&&tekananrendah($tek)>0){
    //echo 'rule 1 hujan';
    $dh=min(suhurendah($suhu),kelembapantinggi($kel),tekananrendah($tek));
    if($dh>$maxh){
        $maxh=$dh;
        //echo $maxh;
    }
}

if(suhutinggi($suhu)>0&&kelembapanrendah($kel)>0&&tekananrendah($tek)>0){
    //echo 'rule2 cerah';
    $dc=min(suhutinggi($suhu),kelembapanrendah($kel),tekananrendah($tek));
    if($dc>$maxc){
        $maxc=$dc;
        //echo $maxc;
    }
}

if(suhusedang($suhu)>0&& kelembapansedang($kel)>0&& tekananrendah($tek)>0){
    //echo 'rule3 berwawan';
    $da=min(suhusedang($suhu),kelembapansedang($kel),tekananrendah($tek));
    if($da>$maxa){
        $maxa=$da;
        //echo $maxa;
    }
}

if(suhusedang($suhu)>0&&  kelembapantinggi($kel)>0&&tekananrendah($tek)>0){
    //echo 'rule 4 berawan';
    $da=min(suhusedang($suhu),kelembapantinggi($kel),tekananrendah($tek));
    if($da>$maxa){
        $maxa=$da;
        //echo $maxa;
    }
}

if(suhusedang($suhu)>0&&kelembapansedang($kel)>0&&tekanantinggi($tek)>0){
    //echo 'rule 5 cerah';
    $dc=min(suhusedang($suhu),kelembapansedang($kel),tekanantinggi($tek));
    if($dc>$maxc){
        $maxc=$dc;
        //echo $maxc;
    }
}

if(suhurendah($suhu)>0&&kelembapansedang($kel)>0&&tekananrendah($tek)>0)
{
    //echo 'rule 6 berawan';
    $da=min(suhurendah($suhu),kelembapansedang($kel),tekananrendah($tek));
    if($da>$maxa){
        $maxa=$da;
        //echo $maxa;
    }
}

if(suhutinggi($suhu)>0&&kelembapansedang($kel)>0&&tekananrendah($tek)>0){
    //echo 'rule 7 berawan';
    $da=min(suhutinggi($suhu),kelembapansedang($kel),tekananrendah($tek));
    if($da>$maxa){
        $maxa=$da;
        //echo $maxa;
    }
}

if(suhurendah($suhu)>0&&kelembapanrendah($kel)>0&&tekanantinggi($tek)>0){
    //echo 'rule 8 cerah';
    $dc=min(suhurendah($suhu),kelembapanrendah($kel),tekanantinggi($tek));
    if($dc>$maxc){
        $maxc=$dc;
        //echo $maxc;
    }
}

if(suhusedang($suhu)>0&&  kelembapanrendah($kel)>0&&tekananrendah($tek)>0){
    //echo 'rule 9 cerah';
    $dc=min(suhusedang($suhu),kelembapanrendah($kel),tekananrendah($tek));
    if($dc>$maxc){
        $maxc=$dc;
        //echo $maxc;
    }
}

if(suhurendah($suhu)>0&&kelembapantinggi($kel)>0&&tekanantinggi($tek)>0){
    //echo 'rule 10 berawan';
    $da=min(suhurendah($suhu),kelembapantinggi($kel),tekanantinggi($tek));
    if($da>$maxa){
        $maxa=$da;
        //echo $maxa;
    }
}

if(suhurendah($suhu)>0&&kelembapansedang($kel)>0&&tekanantinggi($tek)>0){
    //echo 'rule 11 berawan';
    $da=  min(suhurendah($suhu),kelembapansedang($kel)&&tekanantinggi($tek));
    if($da>$maxa){
        $maxa=$da;
        //echo $maxa;
    }
}

if(suhurendah($suhu)>0&&kelembapanrendah($kel)>0&&tekananrendah($tek)>0){
    //echo 'rule 12 berawan';
    $da=  min(suhurendah($suhu),kelembapanrendah($kel),tekananrendah($tek));
    if($da>$maxa){
        $maxa=$da;
        //echo $maxa;
    }
}
if(suhusedang($suhu)>0&&kelembapanrendah($kel)>0&&tekanantinggi($tek)>0){
    //echo 'rule 13 cerah';
    $dc= min(suhusedang($suhu),kelembapanrendah($kel),tekanantinggi($tek));
    if($dc>$maxc){
        $maxc=$dc;
        //echo $maxc;
    }
}

if(suhusedang($suhu)>0&&kelembapantinggi($kel)>0&&tekanantinggi($tek)>0){
    //echo 'rule 14 berawan';
    $da=min(suhusedang($suhu),kelembapantinggi($kel),tekanantinggi($tek));
    if($da>$maxa){
        $maxa=$da;
        //echo $maxa;
    }
}

if(suhutinggi($suhu)>0&&kelembapanrendah($kel)>0&&tekanantinggi($tek)>0){
    //echo 'rule 15 cerah';
    $dc=min(suhutinggi($suhu),kelembapanrendah($kel),tekanantinggi($tek));
    if($dc>$maxc){
        $maxc=$dc;
        //echo $maxc;
    }
}

if (suhutinggi($suhu)>0&&kelembapansedang($kel)>0&&tekanantinggi($tek)>0){
    //echo 'rule 16 cerah';
    $dc=min(suhutinggi($suhu),kelembapansedang($kel),tekanantinggi($tek));
    if($dc>$maxc){
        $maxc=$dc;
        //echo $maxc;
    }
}

if(suhutinggi($suhu)>0&&kelembapantinggi($kel)>0&&tekananrendah($tek)>0){
    //echo 'rule 17 awan';
    $da=min(suhutinggi($suhu),kelembapantinggi($kel),tekananrendah($tek));
    if($da>$maxa){
        $maxa=$da;
        //echo $maxa;
    }
}

if(suhutinggi($suhu)>0&&kelembapantinggi($kel)>0&&tekanantinggi($tek)>0){
    //echo 'rule 18 cerah';
    $dc=min(suhutinggi($suhu),kelembapantinggi($kel),tekanantinggi($tek));
    if($dc>$maxc){
        $maxc=$dc;
        //echo $maxc;
    }
}

//centroid
if($maxh==0){
    $atas=$atas+0;
    $bawah=$bawah+0;
}
else {
    $c1=pow(hujan($maxh),3)/3;
    $c2=(1*($maxh/2))-(pow(hujan($maxh),2)*($maxh/2));
    $a1=((hujan($maxh)-0)*$maxh)/2;
    $a2=(1-hujan($maxh))*$maxh;
    $atas=$atas+$c1+$c2;
    $bawah=$bawah+$a1+$a2;
}
if($maxa==0){
    $atas=$atas+0;
    $bawah=$bawah+0;
}
else{
    $c3=((pow(awan($maxa),3)/3)-(pow(awan($maxa),2)/2))-
            ((pow(1,3)/3)-(pow(1,2)/2));
    $c4=(pow(2,2)*($maxa/2))-(pow(awan($maxa),2)*($maxa/2));
    $a3=((awan($maxa)-1)*$maxa)/2;
    $a4=(2-awan($maxa))*$maxa;
    $atas=$atas+$c3+$c4;
    $bawah=$bawah+$a3+$a4;
    }

if($maxc==0){
    $atas=$atas+0;
    $bawah=$bawah+0;
}
else{
    $c5=((pow(cerah($maxc),3)/3)-(pow(cerah($maxc),2)))-
            ((pow(2,3)/3)-(pow(2,2)));
    $c6=(pow(3,2)*($maxc/2))-(pow(cerah($maxc),2)*($maxc/2));
    $a5=((cerah($maxc)-2)*$maxc)/2;
    $a6=(3-cerah($maxc))*$maxc;
    $atas=$atas+$c5+$c6;
    $bawah=$bawah+$a5+$a6;
    }
// 1,2,3 id weather
$prediksi=$atas/$bawah;
if($prediksi>=0.0 & $prediksi <1.0){
    $hprediksi='1';
}
if($prediksi>=1.0 & $prediksi <2.0){
    $hprediksi='2';
}
if($prediksi>=2.0 & $prediksi <3.0){
    $hprediksi='3';
}
$prediksi=$hprediksi;
return $prediksi;
}
?>