<?php
require_once '../conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $placa = $_POST['placa_carro'] ?? '';

    if (empty($placa)) {
        echo "Informe a placa do veículo!";
        exit;
    }

    try {
        $sql = "DELETE FROM Veiculo WHERE placa_carro = :placa";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':placa', $placa);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "Veículo excluído com sucesso!";
        } else {
            echo "Nenhum veículo encontrado com essa placa.";
        }
    } catch (PDOException $e) {
        echo "Erro ao excluir veículo: " . $e->getMessage();
    }
}
?>
