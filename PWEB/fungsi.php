<?php
function informasi($matkul, $materi="Review UTS"){
 echo "Halo, ";
 echo "Saya sedang belajar ".$matkul."<br/>";
 echo "Saat ini saya belajar materi tentang ".$materi."<br/>";
}
informasi("Pemrograman Berbasis Web","Function di PHP");
echo "<hr>";
$matkul = "Basis Data";
// $materi = "Instalasi DBMS";
informasi($matkul);
?>