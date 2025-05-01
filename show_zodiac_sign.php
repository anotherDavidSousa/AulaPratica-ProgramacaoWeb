<?php
// Processamento da data
$data_nascimento = $_POST['data_nascimento'];
$data = DateTime::createFromFormat('Y-m-d', $data_nascimento);
$dia_mes = $data->format('d/m');

// Carregar XML
$signos = simplexml_load_file("signos.xml");

// Função para comparar datas
function encontraSigno($dia_mes, $signos) {
    foreach ($signos->signo as $signo) {
        $inicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
        $fim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);
        $data_user = DateTime::createFromFormat('d/m', $dia_mes);

        // Ajuste para signos que cruzam o ano (ex: Capricórnio)
        if ($inicio > $fim) {
            if ($data_user >= $inicio || $data_user <= $fim) {
                return $signo;
            }
        } else {
            if ($data_user >= $inicio && $data_user <= $fim) {
                return $signo;
            }
        }
    }
    return null;
}

$signo_usuario = encontraSigno($dia_mes, $signos);
?>

<?php include("layouts/header.php"); ?>

<div class="container mt-5">
    <?php if ($signo_usuario): ?>
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-body text-center">
                <h2 class="card-title">Seu signo é: <?= $signo_usuario->signoNome ?></h2>
                <p class="card-text"><?= $signo_usuario->descricao ?></p>
                <a href="index.php" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger">Data inválida ou signo não encontrado.</div>
    <?php endif; ?>
</div>

</body>
</html>