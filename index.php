<?php
require './vendor/autoload.php';

use src\Usuario;

session_start();

// Limpa a sessão para garantir que não há dados antigos
session_unset();

// Verifica se ja exixte usuarioa na sessao
if (!isset($_SESSION['usuarios'])) {
    // Criar se nao exixtir 
    $user1 = new Usuario('jonathan', '22', '001');
    $user2 = new Usuario('drycka', '30', '002');

    $_SESSION['usuarios'] = [
        '001' => $user1,
        '002' => $user2
    ];

} else {
    // Recupera os usuários da sessão
    $usuarios = $_SESSION['usuarios'];
    $user1 = isset($usuarios['001']) ? $usuarios['001'] : null;
    $user2 = isset($usuarios['002']) ? $usuarios['002'] : null;

    if ($user1 === null || $user2 === null) {
        die('Erro ao recuperar usuários da sessão.');
    }
}

// Processo de transferência
$msg = '';
if (isset($_POST['origem']) && isset($_POST['destino']) && isset($_POST['valor'])) {
    $origem = $_POST['origem'];
    $destino = $_POST['destino'];
    $quantia = floatval($_POST['valor']);

    if (isset($_SESSION['usuarios'][$origem]) && isset($_SESSION['usuarios'][$destino])) {
        $msg = $_SESSION['usuarios'][$origem]->transferir($_SESSION['usuarios'][$destino], $quantia);
    } else {
        $msg = 'Usuário de origem ou destino não encontrado.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Transferência</title>
</head>
<body>
    <h2>Transferência entre Usuários</h2>
    <form method="POST" action="index.php">
        <label for="origem">Número da Conta de Origem:</label>
        <input type="text" id="origem" name="origem" required>
        <label for="destino">Número da Conta de Destino:</label>
        <input type="text" id="destino" name="destino" required>
        <label for="valor">Valor:</label>
        <input type="text" id="valor" name="valor" required>
        <button type="submit">Transferir</button>
    </form>
    <?php if (!empty($msg)): ?>
        <p class="<?php echo (strpos($msg, 'Saldo insuficiente') !== false) ? 'insufficient-balance' : ''; ?>"><?php echo $msg; ?></p>
    <?php endif; ?>

    <h2>Saldos dos Usuários</h2>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Número da Conta</th>
            <th>Saldo</th>
        </tr>
        <?php foreach ($_SESSION['usuarios'] as $usuario): ?>
            <tr>
                <td><?php echo $usuario->getNome(); ?></td>
                <td><?php echo $usuario->getIdade(); ?></td>
                <td><?php echo $usuario->getNumeroConta(); ?></td>
                <td <?php echo ($usuario->getSaldo() < 0) ? 'class="saldo-insuficiente"' : ''; ?>><?php echo $usuario->getSaldo(); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
