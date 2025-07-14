<?php
$id = $_GET['id'] ?? null;
$imovel = [
  'nome' => '',
  'tipo' => ['', ''],
  'valor' => '',
  'quartos' => '',
  'cep' => '',
  'rua' => '',
  'numero' => '',
  'bairro' => '',
  'cidade' => '',
  'uf' => ''
];

if ($id) {
  $response = file_get_contents("http://localhost:5875/imovel/$id");
  $data = json_decode($response, true);

  $imovel = [
    'nome' => $data['nome'] ?? '',
    'tipo' => $data['tipo'] ?? ['', ''],
    'valor' => $data['valor'] ?? '',
    'quartos' => $data['quartos'] ?? '',
    'cep' => $data['endereco'][0]['cep'] ?? '',
    'rua' => $data['endereco'][0]['rua'] ?? '',
    'numero' => $data['endereco'][0]['numero'] ?? '',
    'bairro' => $data['endereco'][0]['bairro'] ?? '',
    'cidade' => $data['endereco'][0]['cidade'] ?? '',
    'uf' => $data['endereco'][0]['uf'] ?? ''
  ];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title><?= $id ? 'Editar Imóvel' : 'Cadastro de Imóvel' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/style.css" rel="stylesheet">
</head>
<body class="container py-5">

  <h1 class="mb-4"><?= $id ? 'Editar Imóvel' : 'Cadastro de Imóvel' ?></h1>

  <form method="POST" action="salvar.php">
  <?php if ($id): ?>
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
  <?php endif; ?>

  <div class="row g-3 mb-3">
    <div class="col-md-6">
      <label for="nome" class="form-label">Nome</label>
      <input name="nome" id="nome" class="form-control" required value="<?= htmlspecialchars($imovel['nome']) ?>">
    </div>
    <div class="col-md-3">
      <label for="valor" class="form-label">Valor</label>
      <input name="valor" id="valor" type="number" step="0.01" min="10000" max="10000000" class="form-control" required value="<?= htmlspecialchars($imovel['valor']) ?>">
    </div>
    <div class="col-md-3">
      <label for="quartos" class="form-label">Quartos</label>
      <input name="quartos" id="quartos" type="number" min="1" max="20" class="form-control" required value="<?= htmlspecialchars($imovel['quartos']) ?>">
    </div>
  </div>

  <div class="row g-3 mb-3">
    <div class="col-md-6">
      <label class="form-label">Tipo</label>
      <input name="tipo[]" class="form-control mb-2" placeholder="Tipo 1" value="<?= htmlspecialchars($imovel['tipo'][0] ?? '') ?>">
      <input name="tipo[]" class="form-control" placeholder="Tipo 2" value="<?= htmlspecialchars($imovel['tipo'][1] ?? '') ?>">
    </div>
    <div class="col-md-3">
      <label for="cep" class="form-label">CEP</label>
      <input name="cep" id="cep" class="form-control" required pattern="\d{8}" title="Informe 8 dígitos numéricos" value="<?= htmlspecialchars($imovel['cep']) ?>">
    </div>
    <div class="col-md-3">
      <label for="numero" class="form-label">Número</label>
      <input name="numero" id="numero" class="form-control" required value="<?= htmlspecialchars($imovel['numero']) ?>">
    </div>
  </div>

  <div class="row g-3 mb-3">
    <div class="col-md-6">
      <label for="rua" class="form-label">Rua</label>
      <input name="rua" id="rua" class="form-control" required value="<?= htmlspecialchars($imovel['rua']) ?>">
    </div>
    <div class="col-md-6">
      <label for="bairro" class="form-label">Bairro</label>
      <input name="bairro" id="bairro" class="form-control" required value="<?= htmlspecialchars($imovel['bairro']) ?>">
    </div>
  </div>

  <div class="row g-3 mb-4">
    <div class="col-md-6">
      <label for="cidade" class="form-label">Cidade</label>
      <input name="cidade" id="cidade" class="form-control" required value="<?= htmlspecialchars($imovel['cidade']) ?>">
    </div>
    <div class="col-md-6">
      <label for="uf" class="form-label">UF</label>
      <input name="uf" id="uf" class="form-control" maxlength="2" required value="<?= htmlspecialchars($imovel['uf']) ?>">
    </div>
  </div>

  <button type="submit" class="btn btn-success"><?= $id ? 'Atualizar' : 'Salvar' ?></button>
  <a href="index.php" class="btn btn-secondary ms-2">Cancelar</a>
</form>


  <script>
    document.getElementById('cep').addEventListener('blur', function () {
      const cep = this.value.replace(/\D/g, '');
      if (cep.length === 8) {
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
          .then(response => response.json())
          .then(data => {
            document.getElementById('rua').value = data.logradouro || '';
            document.getElementById('bairro').value = data.bairro || '';
            document.getElementById('cidade').value = data.localidade || '';
            document.getElementById('uf').value = data.uf || '';
          });
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>