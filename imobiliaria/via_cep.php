<?php
if (isset($_GET['cep'])) {
    $cep = preg_replace('/[^0-9]/', '', $_GET['cep']);
    $url = "https://viacep.com.br/ws/%7B$cep%7D/json/";
    $response = file_get_contents($url);
    echo $response;
}
?>