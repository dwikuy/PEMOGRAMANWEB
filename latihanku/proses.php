<?php
$nilai_1 = $_POST["nilai_kuis"];
$nilai_2 = $_POST["nilai_uts"];
$nilai_3 = $_POST["nilai_uts"];

$nilai4 = $nilai_1*0.3;
$nilai5 = $nilai_2*0.3;
$nilai6 = $nilai_3*0.4;
$hasil = $nilai4 + $nilai5 + $nilai6;




 
echo "Nilai akhir = $hasil";
echo "<br>";

if($hasil>=50){
    echo "anda lulus<br>";
}else{
    echo "anda tidak lulus<br>";
 }

 echo "<a href='nilai.php'>Klik untuk mencoba lagi</a>"


?>