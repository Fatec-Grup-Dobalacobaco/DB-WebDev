function iniciarModal(id){
    document.getElementById(id).style.display="flex";
}

function fecharModal(id){
    document.getElementById(id).style.display="none";
}

// Abrir Modal Cliente

document.getElementById("abrModalC").addEventListener("click", () => {
    iniciarModal('modalClientes');
});

document.getElementById("CancCliente").addEventListener("click", (e) => {
    e.preventDefault();
    document.querySelector('#modalClientes form').reset();
    fecharModal('modalClientes');
});

//Abrir Modal Carro

document.getElementById("abrModalCar").addEventListener("click", () => {
    iniciarModal('modalCarro');
});

document.getElementById("CancCarro").addEventListener("click", (e) => {
    e.preventDefault();
    document.querySelector('#modalCarro form').reset();
    fecharModal('modalCarro');
});

//Abrir Modal Triagem

document.getElementById("abrModalTri").addEventListener("click", () => {
    iniciarModal('modalTriagem');
});

document.getElementById("CancTriagem").addEventListener("click", (e) => {
    e.preventDefault();
    document.querySelector('#modalTriagem form').reset;
    fecharModal('modalTriagem');
});

//Select Funcinários

const selectFuncionarios = document.getElementById('selectFuncionarios');

async function carregarFuncionarios() {
    try {
        const response = await fetch('https://fatecbackend.vercel.app/api/funcionarios/listar');
        
        if (!response.ok) {
            throw new Error(`Erro na requisição: ${response.status}`);
        }

        const data = await response.json();

        selectFuncionarios.innerHTML = '<option value="">Selecione um funcionário</option>';

        data.forEach(func => {
            const option = document.createElement('option');
            option.textContent = func.nome_funcionario;
            selectFuncionarios.appendChild(option);
        });

    } catch (error) {
        console.error('Erro ao carregar funcionários.', error);
        selectFuncionarios.innerHTML = '<option value="">Erro ao carregar</option>';
    }
}
carregarFuncionarios();

//Select Placas

const selectPlacas = document.getElementById('selectPlacas');

async function carregarPlacas() {
    try {
        const response = await fetch('https://fatecbackend.vercel.app/api/veiculos/listar');

        if(!response.ok){
            throw new Error(`Erro na requisição: ${response.status}`);
        }

        const data = await response.json();

        selectPlacas.innerHTML = '<option value="">Selecione a placa</option>';

        data.forEach(func => {
            const option = document.createElement('option');
            option.textContent = func.placa_carro;
            selectPlacas.appendChild(option);

        });
            } catch (error) {
        console.error('Erro ao carregar as placas registradas.', error);
        selectFuncionarios.innerHTML = '<option value="">Erro ao carregar</option>';
    }
}
carregarPlacas();