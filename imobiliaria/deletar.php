<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];

  $options = [
    'http' => [
      'method' => 'DELETE'
    ]
  ];
  $context = stream_context_create($options);

  file_get_contents("http://localhost:5875/imovel/$id", false, $context);

  $_SESSION['mensagem'] = 'Imóvel excluído com sucesso!';
  header('Location: index.php');
  exit;
}

$id = $_GET['id'];
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Confirmar Exclusão</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/style.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <h1 class="mb-4 text-danger">Confirmar Exclusão</h1>
    <p>Tem certeza que deseja <strong>excluir o imóvel com ID <?= htmlspecialchars($id) ?></strong>?</p>

    <form method="POST" class="actions">
      <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
      <button type="submit" class="btn btn-danger">Sim, excluir</button>
      <a href="index.php" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
