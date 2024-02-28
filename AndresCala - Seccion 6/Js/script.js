function obtenerDivisores(numero) {
    const divisores = [];
    for (let i = 1; i < numero; i++) {
        if (numero % i === 0) {
            divisores.push(i);
        }
    }
    return divisores;
}

function sonAmigos(numero1, numero2) {
    const sumaDivisores1 = obtenerDivisores(numero1).reduce((acc, curr) => acc + curr, 0);
    const sumaDivisores2 = obtenerDivisores(numero2).reduce((acc, curr) => acc + curr, 0);

    return sumaDivisores1 === numero2 && sumaDivisores2 === numero1;
}

function verificarAmistad() {
    const num1 = parseInt(document.getElementById('numero1').value);
    const num2 = parseInt(document.getElementById('numero2').value);
    const resultadoElement = document.getElementById('resultado');

    if (isNaN(num1) || isNaN(num2)) {
        resultadoElement.textContent = 'Por favor, ingrese números enteros.';
    } else {
        if (sonAmigos(num1, num2)) {
            resultadoElement.textContent = `${num1} y ${num2} son números amigos.`;
        } else {
            resultadoElement.textContent = `${num1} y ${num2} no son números amigos.`;
        }
    }
}

