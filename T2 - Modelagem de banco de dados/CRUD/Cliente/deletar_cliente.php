<?php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_cliente'] ?? '';

    if (empty($id)) {
        echo "Informe o ID do cliente para exclusão!";
        exit;
    }

    try {
        $sql = "DELETE FROM Cliente WHERE id_cliente = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Cliente excluído com sucesso!";
        } else {
            echo "Nenhum cliente encontrado com esse ID.";
        }
    } catch (PDOException $e) {
        echo "Erro ao excluir cliente: " . $e->getMessage();
    }
}
?>
