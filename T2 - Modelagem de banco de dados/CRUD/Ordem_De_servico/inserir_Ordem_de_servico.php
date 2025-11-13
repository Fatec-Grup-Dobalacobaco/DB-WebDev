<?php
require_once '../conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valor = $_POST['valor_servico'] ?? '';
    $status = $_POST['status_servico'] ?? '';
    $id_funcionario = $_POST['id_funcionario'] ?? '';
    $placa_carro = $_POST['placa_carro'] ?? '';

    if (empty($valor) || empty($status) || empty($id_funcionario) || empty($placa_carro)) {
        echo "Preencha todos os campos!";
        exit;
    }

    try {
        $sql = "INSERT INTO Ordem_de_servico (valor_servico, status_servico, id_funcionario, placa_carro)
                VALUES (:valor, :status, :id_funcionario, :placa)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id_funcionario', $id_funcionario);
        $stmt->bindParam(':placa', $placa_carro);
        $stmt->execute();
        echo "Ordem de serviço inserida com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao inserir ordem de serviço: " . $e->getMessage();
    }
}
?>
