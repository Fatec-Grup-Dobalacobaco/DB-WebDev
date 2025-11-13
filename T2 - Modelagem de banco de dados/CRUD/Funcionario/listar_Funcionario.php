<?php
require_once '../conexao.php';
try {
    $sql = "SELECT * FROM Funcionario";
    $stmt = $pdo->query($sql);
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "ID: {$row['id_funcionario']}<br>";
            echo "Nome: {$row['nome_funcionario']}<br>";
            echo "Telefone: {$row['telefone_funcionario']}<br>";
            echo "Função ID: {$row['id_funcoes']}<br><hr>";
        }
    } else {
        echo "Nenhum funcionário cadastrado.";
    }
} catch (PDOException $e) {
    echo "Erro ao listar funcionários: " . $e->getMessage();
}
?>
