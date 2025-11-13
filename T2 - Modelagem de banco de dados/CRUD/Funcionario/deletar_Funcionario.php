<?php
require_once '../conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_funcionario'] ?? '';
    if (empty($id)) {
        echo "Informe o ID do funcionário!";
        exit;
    }

    try {
        $sql = "DELETE FROM Funcionario WHERE id_funcionario = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "Funcionário excluído com sucesso!";
        } else {
            echo "Nenhum funcionário encontrado.";
        }
    } catch (PDOException $e) {
        echo "Erro ao excluir funcionário: " . $e->getMessage();
    }
}
?>
