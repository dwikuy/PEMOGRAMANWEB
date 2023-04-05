 <?php
 $nilai=50;
 if($nilai>=70){
    echo "anda lulus";

}else if($nilai>=50){
    echo "anda lulus bersyarat";
}else{
    echo "anda tidak lulus";
 }
echo "<br>";
$cuaca="Panas";
switch($cuaca){
    case "Panas";
    echo "Jemur baju";
    break;
    case "Hujan";
    echo "Diam dirumah";
    break;
    case "Mendung";
    echo "Sebaiknya tidak keluar rumah";
    break;
    case "Berawan";
    echo "Ayok main bola";
    break;
    default;
    echo "Saya tidak tahu cuaca hari ini";
    break;
}
 ?>