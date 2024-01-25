
var a = prompt('Введите число для которого нужно найти обратное число');
var modul = prompt('Введите модуль');
var x = 1;

while(x > 0){
    var res = (a * x) % modul;
    if(res == 1){
        document.writeln(`Обратным числом для ${a} по модулю ${modul} будет ${x}`);
        break;
    } else{
        x++;
    }
}
