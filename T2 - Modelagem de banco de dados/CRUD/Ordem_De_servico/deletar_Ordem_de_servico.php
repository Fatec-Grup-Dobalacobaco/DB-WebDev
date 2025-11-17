<?php
require_once '../conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_ordem_de_servico'] ?? '';
    if (empty($id)) {
        echo "Informe o ID da ordem de serviço!";
        exit;
    }

    try {
        $sql = "DELETE FROM Ordem_de_servico WHERE id_ordem_de_servico = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "Ordem de serviço excluída com sucesso!";
        } else {
            echo "Nenhuma ordem de serviço encontrada.";
        }
    } catch (PDOException $e) {
        echo "Erro ao excluir ordem de serviço: " . $e->getMessage();
    }
}
?>
