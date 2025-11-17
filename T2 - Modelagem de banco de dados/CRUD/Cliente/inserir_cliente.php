<?php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_cliente'] ?? '';
    $cpf = $_POST['cpf_cliente'] ?? '';
    $telefone = $_POST['telefone_cliente'] ?? '';

    if (empty($nome) || empty($cpf) || empty($telefone)) {
        echo "Preencha todos os campos!";
        exit;
    }

    try {
        $sql = "INSERT INTO Cliente (nome_cliente, cpf_cliente, telefone_cliente) VALUES (:nome, :cpf, :telefone)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->execute();

        echo "Cliente inserido com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao inserir cliente: " . $e->getMessage();
    }
}
?>
