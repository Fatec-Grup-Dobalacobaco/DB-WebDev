<?php
require_once '../conexao.php';
try {
    $sql = "SELECT * FROM Triagem";
    $stmt = $pdo->query($sql);
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "ID: {$row['id_triagem']}<br>";
            echo "Data: {$row['data_triagem']}<br>";
            echo "Problema: {$row['problema']}<br>";
            echo "ID Funcionário: {$row['id_funcionario']}<br>";
            echo "Placa: {$row['placa_carro']}<br>";
            echo "ID Ordem: {$row['id_ordem_de_servico']}<br><hr>";
        }
    } else {
        echo "Nenhuma triagem cadastrada.";
    }
} catch (PDOException $e) {
    echo "Erro ao listar triagens: " . $e->getMessage();
}
?>
