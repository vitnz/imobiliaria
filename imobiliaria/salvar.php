<?php
session_start();

$id = $_POST['id'] ?? null;

$data = [
  'nome' => $_POST['nome'],
  'tipo' => $_POST['tipo'],
  'valor' => (float) $_POST['valor'],
  'quartos' => (int) $_POST['quartos'],
  'venda' => true,
  'aluguel' => false,
  'dataAnuncio' => date('c'),
  'endereco' => [[
    'rua' => $_POST['rua'],
    'numero' => $_POST['numero'],
    'bairro' => $_POST['bairro'],
    'cidade' => $_POST['cidade'],
    'uf' => $_POST['uf'],
    'cep' => $_POST['cep'],
  ]],
];

if ($id) {
  $data['id'] = $id;
  $url = "http://localhost:5875/imovel/$id";
  $method = 'PUT';
  $_SESSION['mensagem'] = 'Imóvel editado com sucesso!';
} else {
  $url = "http://localhost:5875/imovel";
  $method = 'POST';
  $_SESSION['mensagem'] = 'Imóvel criado com sucesso!';
}

$options = [
  'http' => [
    'method' => $method,
    'header' => "Content-Type: application/json",
    'content' => json_encode($data)
  ]
];

$context = stream_context_create($options);
file_get_contents($url, false, $context);

header('Location: index.php');
exit;