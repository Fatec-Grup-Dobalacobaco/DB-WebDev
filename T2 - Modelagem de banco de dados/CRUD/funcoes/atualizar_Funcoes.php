<?php
require_once '../conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_funcoes'] ?? '';
    $nome = $_POST['nome_funcao'] ?? '';

    if (empty($id) || empty($nome)) {
        echo "Preencha todos os campos!";
        exit;
    }

    try {
        $sql = "UPDATE Funcoes SET nome_funcao = :nome WHERE id_funcoes = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Função atualizada com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao atualizar função: " . $e->getMessage();
    }
}
?>
