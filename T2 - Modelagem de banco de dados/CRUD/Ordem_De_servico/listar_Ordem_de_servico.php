    <?php
require_once '../conexao.php';
try {
    $sql = "SELECT * FROM Ordem_de_servico";
    $stmt = $pdo->query($sql);
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "ID: {$row['id_ordem_de_servico']}<br>";
            echo "Valor: {$row['valor_servico']}<br>";
            echo "Status: {$row['status_servico']}<br>";
            echo "ID Funcionário: {$row['id_funcionario']}<br>";
            echo "Placa: {$row['placa_carro']}<br><hr>";
        }
    } else {
        echo "Nenhuma ordem de serviço cadastrada.";
    }
} catch (PDOException $e) {
    echo "Erro ao listar ordens de serviço: " . $e->getMessage();
}
?>
