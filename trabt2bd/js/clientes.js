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
        document.getElementById(`delete-button${cliente.id_cliente}`).addEventListener('click', function() {
            removerCliente(cliente.id_cliente);
        });
        document.getElementById(`save-button${cliente.id_cliente}`).addEventListener('click', function() {
            atualizarCliente(cliente.id_cliente);
        });
    }
    } catch (error) {
        console.error('Erro ao buscar clientes:', error);
    }
}
fetchClientes(clientes);
async function atualizarCliente(id) {
    try {
        const nomeCliente = document.getElementById(`nomeCliente${id}`).value;
        const cpfCliente = document.getElementById(`cpfCliente${id}`).value;
        const telCliente = document.getElementById(`telCliente${id}`).value;
        const response = await fetch(`https://fatecbackend.vercel.app/api/clientes/atualizar/${id}`, {
            method: 'PUT',
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
            throw new Error('Erro ao atualizar cliente');
        }
        alert('Cliente atualizado com sucesso!');
        location.reload();
    } catch (error) {
        console.error('Erro ao atualizar cliente:', error);
        alert('Erro ao atualizar cliente.');
    }
}
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
async function removerCliente(id) {
    try {
        const response = await fetch(`https://fatecbackend.vercel.app/api/clientes/remover/${id}`, {
            method: 'DELETE'
        });
        if (!response.ok) {
            throw new Error('Erro ao remover cliente');
        }
        alert('Cliente removido com sucesso!');
        location.reload();
    } catch (error) {
        console.error('Erro ao remover cliente:', error);
        alert('Erro ao remover cliente.');
    }
}
document.getElementById('add-client-form').addEventListener('submit', function(event) {
    event.preventDefault();
    adicionarCliente();
});