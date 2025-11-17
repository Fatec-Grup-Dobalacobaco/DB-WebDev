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
        $sql = "UPDATE Veiculo SET id_cliente = :id_cliente WHERE placa_carro = :placa";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->bindParam(':placa', $placa);
        $stmt->execute();
        echo "Veículo atualizado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao atualizar veículo: " . $e->getMessage();
    }
}
?>
