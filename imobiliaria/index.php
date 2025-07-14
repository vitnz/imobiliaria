<?php
 session_start();
$imoveis = json_decode(file_get_contents('http://localhost:5875/imovel'), true);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/noty/lib/noty.css" />
<script src="https://cdn.jsdelivr.net/npm/noty/lib/noty.min.js"></script>

  <meta charset="UTF-8">
  <title>Catálogo de Imóveis</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/style.css" rel="stylesheet">
</head>
<body class="container py-4">
  <div class= page-title>
    <h1 class="mb-4">Catálogo de Imóveis</h1>
  <a href="form.php" class="btn btn-primary mb-3">Novo Imóvel</a>
  </div>

  <table class="table table-striped table-bordered">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Tipo</th>
        <th>Valor</th>
        <th>Cidade</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($imoveis)): ?>
  <tr>
    <td colspan="6" class="text-center">Nenhum imóvel cadastrado.</td>
  </tr>
<?php else: ?>
  <?php foreach ($imoveis as $imovel): ?>
    <tr>
      <td><?= $imovel['id'] ?></td>
      <td><?= $imovel['nome'] ?></td>
      <td><?= implode(', ', $imovel['tipo']) ?></td>
      <td>R$ <?= number_format($imovel['valor'], 2, ',', '.') ?></td>
      <td><?= $imovel['endereco'][0]['cidade'] ?? 'N/A' ?></td>
      <td>
        <a href="form.php?id=<?= $imovel['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
        <a href="deletar.php?id=<?= $imovel['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
      </td>
    </tr>
  <?php endforeach; ?>
<?php endif; ?>
    </tbody>
  </table>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php if (isset($_SESSION['mensagem'])): ?>
  <script>
    new Noty({
      text: "<?= addslashes($_SESSION['mensagem']) ?>",
      type: 'success',
      layout: 'topRight',
      timeout: 3000,
      progressBar: true
    }).show();
  </script>
  <?php unset($_SESSION['mensagem']); ?>
<?php endif; ?>
</html>
