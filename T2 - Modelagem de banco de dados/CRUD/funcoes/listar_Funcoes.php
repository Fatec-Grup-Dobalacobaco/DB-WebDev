<?php
require_once '../conexao.php';
try {
    $sql = "SELECT * FROM Funcoes";
    $stmt = $pdo->query($sql);
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "ID: {$row['id_funcoes']}<br>";
            echo "Função: {$row['nome_funcao']}<br><hr>";
        }
    } else {
        echo "Nenhuma função cadastrada.";
    }
} catch (PDOException $e) {
    echo "Erro ao listar funções: " . $e->getMessage();
}
?>
