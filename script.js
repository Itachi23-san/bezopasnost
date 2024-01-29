
class Arifm {

    constructor(num1, num2, modul) {
        this.num1 = num1;
        this.num2 = num2;
        this.modul = modul;
    }

    Summa() {
        return `Сумма x и y по модулю ${this.modul}: ` + (this.num1 + this.num2) % this.modul;
    }
    Mult() {
        return `Произведение x и y по модулю ${this.modul}: ` + (this.num1 * this.num2) % this.modul;
    }
    Degree() {
        return `Число х в степени y по модулю ${this.modul}: ` + (this.num1 ** this.num2) % this.modul;
    }
}

var x = prompt("Введите число x:");
var y = prompt("Введите число y:");
var z = prompt("Введите модуль:");

var numbers = new Arifm(x, y, z);

document.writeln(numbers.Summa() + "<br>" + numbers.Mult() + "<br>" + numbers.Degree());
