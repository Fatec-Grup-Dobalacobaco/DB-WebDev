<?php
require_once '../conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST['data_triagem'] ?? '';
    $problema = $_POST['problema'] ?? '';
    $id_funcionario = $_POST['id_funcionario'] ?? '';
    $placa_carro = $_POST['placa_carro'] ?? '';
    $id_ordem_de_servico = $_POST['id_ordem_de_servico'] ?? '';

    if (empty($data) || empty($problema) || empty($id_funcionario) || empty($placa_carro) || empty($id_ordem_de_servico)) {
        echo "Preencha todos os campos!";
        exit;
    }

    try {
        $sql = "INSERT INTO Triagem (data_triagem, problema, id_funcionario, placa_carro, id_ordem_de_servico)
                VALUES (:data, :problema, :id_funcionario, :placa, :id_ordem)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':problema', $problema);
        $stmt->bindParam(':id_funcionario', $id_funcionario);
        $stmt->bindParam(':placa', $placa_carro);
        $stmt->bindParam(':id_ordem', $id_ordem_de_servico);
        $stmt->execute();
        echo "Triagem inserida com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao inserir triagem: " . $e->getMessage();
    }
}
?>
