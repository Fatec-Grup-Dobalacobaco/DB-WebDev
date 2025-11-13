<?php
require_once '../conexao.php';

try {
    $sql = "SELECT * FROM Cliente";
    $stmt = $pdo->query($sql);

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "ID: {$row['id_cliente']}<br>";
            echo "Nome: {$row['nome_cliente']}<br>";
            echo "CPF: {$row['cpf_cliente']}<br>";
            echo "Telefone: {$row['telefone_cliente']}<br>";
            echo "<hr>";
        }
    } else {
        echo "Nenhum cliente cadastrado.";
    }
} catch (PDOException $e) {
    echo "Erro ao listar clientes: " . $e->getMessage();
}
?>
