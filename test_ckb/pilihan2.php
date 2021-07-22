<?php
$jumlah=7;
for($a=1; $a<=$jumlah; $a=$a+2){
    for($b=1; $b<=$a; $b=$b+2){
        echo '&nbsp';
    }
    for($c=$jumlah; $c>=$a; $c-=1){
      if($c == $jumlah or $c == $a){
        echo '*';
      }else{
      	echo '&nbsp';
      }
    }
    echo "<br/>";
}
for($a=3; $a<=$jumlah; $a=$a+2){
    for($b=$jumlah; $b>=$a; $b=$b-2){
        print('&nbsp');
    }
    for($c=1; $c<=$a; $c++){
      if($c == 1 or $c == $a)
      {
        echo '*';
      }else{
      	echo '&nbsp';
      }
    }
    echo "<br/>";
}