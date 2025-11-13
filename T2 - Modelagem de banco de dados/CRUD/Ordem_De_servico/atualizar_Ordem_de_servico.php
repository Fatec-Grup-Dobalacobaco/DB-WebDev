<?php
require_once '../conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_ordem_de_servico'] ?? '';
    $valor = $_POST['valor_servico'] ?? '';
    $status = $_POST['status_servico'] ?? '';
    $id_funcionario = $_POST['id_funcionario'] ?? '';
    $placa_carro = $_POST['placa_carro'] ?? '';

    if (empty($id) || empty($valor) || empty($status) || empty($id_funcionario) || empty($placa_carro)) {
        echo "Preencha todos os campos!";
        exit;
    }

    try {
        $sql = "UPDATE Ordem_de_servico SET valor_servico = :valor, status_servico = :status, id_funcionario = :id_funcionario, placa_carro = :placa WHERE id_ordem_de_servico = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id_funcionario', $id_funcionario);
        $stmt->bindParam(':placa', $placa_carro);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Ordem de serviço atualizada com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao atualizar ordem de serviço: " . $e->getMessage();
    }
}
?>
