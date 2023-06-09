<?php
// library
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/libraries/ip-vanish/module.php';

// implements
use Curl\Curl;
$IPVanish = new IPVanish();

start:

// configuration
include('config/configuration.php');

$curl = new Curl();
$curl->setProxy($servers, $port, $username, $password);
$curl->setProxyType(CURLPROXY_SOCKS5);
$curl->get('http://checkip.dyndns.org/');

function curl($url, $data = 0, $header, $cookie = 0, $servers=false, $port=false, $username, $password) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://citizen.dosi.world/api/citizen/v1'.$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, $port);
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
    curl_setopt($ch, CURLOPT_PROXY, $servers);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $username . ':' . $password);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    // curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    if ($curl->error) {
        echo '[-] Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n\n";
    
        goto start;
    } else {
        preg_match_all('/IP Address: (.*)<\/body><\/html>/', $curl->response, $ip_address);
    
        echo "[+] Connected " . $servers . ' | ' . $ip_address[1][0] . "\n";

	$headers = array();
	$headers[] = 'Host: citizen.dosi.world';
	$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:106.0) Gecko/20100101 Firefox/106.0';
	$headers[] = 'Accept: application/json, text/plain, */*';
	$headers[] = 'Accept-Language: id,en-US;q=0.7,en;q=0.3';
	$headers[] = 'Accept-Encoding: gzip, deflate, br';
	$headers[] = 'Referer: https://citizen.dosi.world/bonus';
	$headers[] = 'Connection: keep-alive';
	$headers[] = 'Cookie: '.$header ;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    if($data) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    if($cookie) {
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    }
    $x = curl_exec($ch);
    curl_close($ch);
    return $x;
}
while (true) {
$list = file_get_contents('token.txt');
$datas = explode("\n", str_replace("\r", "", $list));
for ($i = 0; $i < count($datas); $i++) {
$cookie = $datas[$i];
$claim = curl('/events/check-in',1,$cookie);
$coin = curl('/balance',0,$cookie);
$nft = curl('/membership',0,$cookie);
$adventure = curl('/adventures',0,$cookie);
$akun = curl('/login/status?loginFinishUri=https://citizen.dosi.world/auth/verify&logoutFinishUri=https://citizen.dosi.world/auth/logout',0,$cookie);
$email = json_decode($akun);
$result = json_decode($claim);
$totalnft = json_decode($nft);
$total = json_decode($coin);
echo $email->email.'. ';
echo 'hasil : '.$result->statusMessage."\n";
echo 'total coin: '.$total->amount."\n";
echo 'total NFT: '.$totalnft->nftCount."\n";
}
echo 'tidur selama 24 jam';
sleep(86460);
}
			?>