async function atualizarDashboard() {
    try {
        
        const clientesResponse = await fetch('https://fatecbackend.vercel.app/api/clientes/listar');
        const clientes = await clientesResponse.json();
        document.getElementById('client-count').textContent = clientes.length;

        const veiculosResponse = await fetch('https://fatecbackend.vercel.app/api/veiculos/listar');
        const veiculos = await veiculosResponse.json();
        document.getElementById('vehicle-count').textContent = veiculos.length;

        const osResponse = await fetch('https://fatecbackend.vercel.app/api/ordens/listar');
        const ordens = await osResponse.json();

        const pendentes = ordens.filter(os => os.status_servico.toLowerCase() === 'pendente');
        const concluidos = ordens.filter(os => os.status_servico.toLowerCase() === 'concluido');

        document.getElementById('pending-count').textContent = pendentes.length;
        document.getElementById('completed-count').textContent = concluidos.length;

    } catch (error) {
        console.error('Erro ao atualizar o dashboard:', error);
    }
}

document.addEventListener('DOMContentLoaded', atualizarDashboard);
