const botaoEnviar = document.getElementById('enviar');
const inputs = [...document.querySelectorAll('input[type="radio"]')]
const idPerguntas = [...new Set(inputs.map(input => input.name))]

const perguntas = idPerguntas.map(id => ({
    id,
    inputs: inputs.filter(input => input.name === id)
}))

function alteraEstadoDoBotao() {
    const inputsMarcados = perguntas.map(pergunta => {
        return pergunta.inputs.some(input => input.checked)
    })

    const todasPerguntasRespondidas = inputsMarcados.every(item => item)
    if (todasPerguntasRespondidas) {
        botaoEnviar.removeAttribute('disabled')
    }
}

inputs.forEach(input => {
    input.addEventListener('click', () => alteraEstadoDoBotao())
})