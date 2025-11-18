const response = await fetch('https://fatecbackend.vercel.app/api/clientes/listar');
const clientes = await response.json();
async function fetchClientes(clientes) {
    try {

    for (const cliente of clientes) {
        const trCliente = document.createElement('tr');
        trCliente.classList.add('table-line');
        trCliente.innerHTML = `
        <td class="table-cellula">
                        <input type="text" name="nomeCliente" value="${cliente.nome_cliente}" id="nomeCliente${cliente.id_cliente}" class="editable-table-input">
                    </td>
                    <td class="table-cellula">
                        <input type="text" name="cpfCliente" value="${cliente.cpf_cliente}" id="cpfCliente${cliente.id_cliente}" class="editable-table-input">
                    </td>
                    <td class="table-cellula">
                        <input type="tel" name="telCliete" value="${cliente.telefone_cliente}" id="telCliente${cliente.id_cliente}" class="editable-table-input">
                    </td>
                    <td class="table-cellula table-cellula-buttons">
                        <button class="button save-button" id="save-button${cliente.id_cliente}">Salvar</button>
                        <button class="button" id="delete-button${cliente.id_cliente}">Excluir</button>
                    </td>
        `;
        document.querySelector('tbody').appendChild(trCliente);
    }
    } catch (error) {
        console.error('Erro ao buscar clientes:', error);
    }
}
fetchClientes(clientes);
async function adicionarCliente() {
    try {
        const nomeCliente = document.getElementById(`nome`).value;
        const cpfCliente = document.getElementById(`cpf`).value;
        const telCliente = document.getElementById(`tel`).value;
        const response = await fetch('https://fatecbackend.vercel.app/api/clientes/adicionar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                nome_cliente: nomeCliente,
                cpf_cliente: cpfCliente,
                telefone_cliente: telCliente
            })
        });
        if (!response.ok) {
            throw new Error('Erro ao adicionar cliente');
        }
        alert('Cliente adicionado com sucesso!');
        location.reload();
    } catch (error) {
        console.error('Erro ao adicionar cliente:', error);
        alert('Erro ao adicionar cliente.');
    }
}
document.getElementById('add-client-form').addEventListener('submit', function(event) {
    event.preventDefault();
    adicionarCliente();
});