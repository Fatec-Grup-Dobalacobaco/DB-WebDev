<?php
require_once '../conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_funcionario'] ?? '';
    $nome = $_POST['nome_funcionario'] ?? '';
    $telefone = $_POST['telefone_funcionario'] ?? '';
    $id_funcoes = $_POST['id_funcoes'] ?? '';

    if (empty($id) || empty($nome) || empty($telefone) || empty($id_funcoes)) {
        echo "Preencha todos os campos!";
        exit;
    }

    try {
        $sql = "UPDATE Funcionario SET nome_funcionario = :nome, telefone_funcionario = :telefone, id_funcoes = :id_funcoes WHERE id_funcionario = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':id_funcoes', $id_funcoes);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Funcionário atualizado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao atualizar funcionário: " . $e->getMessage();
    }
}
?>
