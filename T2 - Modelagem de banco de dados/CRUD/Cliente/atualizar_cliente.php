<?php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_cliente'] ?? '';
    $nome = $_POST['nome_cliente'] ?? '';
    $cpf = $_POST['cpf_cliente'] ?? '';
    $telefone = $_POST['telefone_cliente'] ?? '';

    if (empty($id) || empty($nome) || empty($cpf) || empty($telefone)) {
        echo "Preencha todos os campos!";
        exit;
    }

    try {
        $sql = "UPDATE Cliente SET nome_cliente = :nome, cpf_cliente = :cpf, telefone_cliente = :telefone WHERE id_cliente = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "Cliente atualizado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao atualizar cliente: " . $e->getMessage();
    }
}
?>
