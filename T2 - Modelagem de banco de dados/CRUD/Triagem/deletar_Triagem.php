<?php
require_once '../conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_triagem'] ?? '';
    if (empty($id)) {
        echo "Informe o ID da triagem!";
        exit;
    }

    try {
        $sql = "DELETE FROM Triagem WHERE id_triagem = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "Triagem excluída com sucesso!";
        } else {
            echo "Nenhuma triagem encontrada.";
        }
    } catch (PDOException $e) {
        echo "Erro ao excluir triagem: " . $e->getMessage();
    }
}
?>
