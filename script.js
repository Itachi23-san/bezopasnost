var N = prompt("Введите модуль:");
var Phi = 0;

for (let i = 1; i < N; i++) {
    let isSimple = true;

    for (let j = 2; j < N; j++) {
        if (i % j === 0 && N % j === 0) {
            isSimple = false;
            break;
        }
    }

    if (isSimple) {
        Phi++;
    }
}

document.writeln(`Фи равно ${Phi}` + "<br>")

var g;
for (g = 2; g < N; g++) {
    if ((g ** Phi) % N === 1) {
        document.writeln(`Первообразный корень по модулю ${N} равен ${g}`);
        break;
    }
}