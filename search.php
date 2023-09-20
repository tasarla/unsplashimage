<?php
header("Content-type: text/html; charset=UTF-8");

$baslik = "Turkey";
$baslik = rawurlencode($baslik);

$api_url = "https://api.unsplash.com/search/photos?page=1&query=$baslik";

// Unsplash API anahtar�n�z� burada belirtin
$client_id = 'apikey';

// cURL iste�i olu�turun
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Client-ID ' . $client_id,
]);

// API'den veriyi al�n
$response = curl_exec($ch);
curl_close($ch);

// JSON yan�t�n� diziye �evirin
$data = json_decode($response, true);

echo "$api_url";


// Resimleri g�r�nt�le
if (isset($data['results'])) {
    foreach ($data['results'] as $photo) {
        //echo '<img src="' . $photo['urls']['regular'] . '" alt="' . $photo['alt_description'] . '">'; // big size
        echo '<img src="' . $photo['urls']['small'] . '" alt="' . $photo['alt_description'] . '">';
        $res = $photo['urls']['small'];   //image url small
      

?>
