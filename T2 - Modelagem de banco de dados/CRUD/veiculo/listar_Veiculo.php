<?php
require_once '../conexao.php';
try {
    $sql = "SELECT * FROM Veiculo";
    $stmt = $pdo->query($sql);
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "Placa: {$row['placa_carro']}<br>";
            echo "ID Cliente: {$row['id_cliente']}<br><hr>";
        }
    } else {
        echo "Nenhum veículo cadastrado.";
    }
} catch (PDOException $e) {
    echo "Erro ao listar veículos: " . $e->getMessage();
}
?>
