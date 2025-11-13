<?php
require_once '../conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $placa = $_POST['placa_carro'] ?? '';
    $id_cliente = $_POST['id_cliente'] ?? '';

    if (empty($placa) || empty($id_cliente)) {
        echo "Preencha todos os campos!";
        exit;
    }

    try {
        $sql = "INSERT INTO Veiculo (placa_carro, id_cliente) VALUES (:placa, :id_cliente)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':placa', $placa);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->execute();
        echo "Veículo inserido com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao inserir veículo: " . $e->getMessage();
    }
}
?>
