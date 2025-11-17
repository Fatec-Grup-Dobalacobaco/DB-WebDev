<?php
require_once '../conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_triagem'] ?? '';
    $data = $_POST['data_triagem'] ?? '';
    $problema = $_POST['problema'] ?? '';
    $id_funcionario = $_POST['id_funcionario'] ?? '';
    $placa_carro = $_POST['placa_carro'] ?? '';
    $id_ordem_de_servico = $_POST['id_ordem_de_servico'] ?? '';

    if (empty($id) || empty($data) || empty($problema) || empty($id_funcionario) || empty($placa_carro) || empty($id_ordem_de_servico)) {
        echo "Preencha todos os campos!";
        exit;
    }

    try {
        $sql = "UPDATE Triagem SET data_triagem = :data, problema = :problema, id_funcionario = :id_funcionario, placa_carro = :placa, id_ordem_de_servico = :id_ordem WHERE id_triagem = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':problema', $problema);
        $stmt->bindParam(':id_funcionario', $id_funcionario);
        $stmt->bindParam(':placa', $placa_carro);
        $stmt->bindParam(':id_ordem', $id_ordem_de_servico);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Triagem atualizada com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao atualizar triagem: " . $e->getMessage();
    }
}
?>
