<?php
require_once '../conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_funcionario'] ?? '';
    $telefone = $_POST['telefone_funcionario'] ?? '';
    $id_funcoes = $_POST['id_funcoes'] ?? '';

    if (empty($nome) || empty($telefone) || empty($id_funcoes)) {
        echo "Preencha todos os campos!";
        exit;
    }

    try {
        $sql = "INSERT INTO Funcionario (nome_funcionario, telefone_funcionario, id_funcoes) VALUES (:nome, :telefone, :id_funcoes)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':id_funcoes', $id_funcoes);
        $stmt->execute();
        echo "Funcionário inserido com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao inserir funcionário: " . $e->getMessage();
    }
}
?>
