<?php
require_once '../conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_funcoes'] ?? '';
    if (empty($id)) {
        echo "Informe o ID da função!";
        exit;
    }

    try {
        $sql = "DELETE FROM Funcoes WHERE id_funcoes = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "Função excluída com sucesso!";
        } else {
            echo "Nenhuma função encontrada.";
        }
    } catch (PDOException $e) {
        echo "Erro ao excluir função: " . $e->getMessage();
    }
}
?>
