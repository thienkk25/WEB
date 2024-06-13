
let mat = document.querySelectorAll('.mat');
for (let i = 1; i < mat.length; i++) {
    mat[i].classList.add('hide');
}
let btn = document.querySelectorAll('.btn');
let randomold = 1;

btn[0].addEventListener('click', () => {
    let random = Math.floor(Math.random() * 6);

    while (random == randomold) {
        random = Math.floor(Math.random() * 6);
    }
    randomold = random;
    for (let i = 0; i < mat.length; i++) {
        mat[i].classList.add('hide');
    }
    mat[random].classList.remove('hide');
    if ((random + 1) % 2 == 0) document.querySelector('#info').innerHTML = 'Chẵn';
    else document.querySelector('#info').innerHTML = 'Lẻ';
    if (document.querySelector('#number').value == random + 1) document.querySelector('#info').innerHTML += " Bạn đã chiến thắng";
    else document.querySelector('#info').innerHTML += " Chúc bạn may mắn lần sau";
});
// ----------------------------------------------------------------
let notify = document.querySelector('#notify');
let randomold2 = 0;
btn[1].addEventListener('click', () => {
    let inputFirst = document.getElementById('first').value;
    let inputLast = document.getElementById('last').value;
    let random = Math.floor(Math.random() * (parseInt(inputLast) - parseInt(inputFirst) + 1) + parseInt(inputFirst));
    while (random == randomold2) {
        random = Math.floor(Math.random() * (parseInt(inputLast) - parseInt(inputFirst) + 1) + parseInt(inputFirst));
    }
    randomold2 = random;
    notify.style.display = "block";
    notify.innerHTML = random;
});