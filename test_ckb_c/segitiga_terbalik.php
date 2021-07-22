<?php
//bikin segitiga kebalik
$jumlah=7;
for($a=1; $a<=$jumlah; $a= $a+2){
    for($b=1; $b<=$a; $b=$b+2){
        echo '&nbsp';
    }
    for($c=$jumlah; $c>=$a; $c--){
        echo '*';
    }
    echo '<br/>';
}
