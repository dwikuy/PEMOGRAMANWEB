<?php
echo "Looping For<br>";

for($i=1;$i<=5;$i++){
    echo "Urutan For ke-$i <br>";
}

echo "<br>Looping While<br>";
$x=1;
while($x<=5){
    echo " Urutan While ke-$x <br>";
    $x=$x+1;
}

echo "<br>Looping DoWhile<br>";
$y=1;
do{
    echo " Urutan DoWhile ke-$y <br>";
    $y=$y+1;
}while($y<=5);


?>