<?php
require_once '../conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_funcao'] ?? '';
    if (empty($nome)) {
        echo "Informe o nome da função!";
        exit;
    }

    try {
        $sql = "INSERT INTO Funcoes (nome_funcao) VALUES (:nome)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        echo "Função inserida com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao inserir função: " . $e->getMessage();
    }
}
?>
