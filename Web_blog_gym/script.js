let Welcome = document.querySelector('#welcome');
let wlcome = "Welcome to Bwhite Gym's website!".split(" ");
let creListT = document.createElement("div");
creListT.classList.add("list-text");
wlcome.forEach((e, i) => {
    let creListC = document.createElement("div");
    creListC.classList.add("list-char");
    creListC.textContent = e;
    creListT.appendChild(creListC);
});
Welcome.appendChild(creListT);

const listTextChars = document.querySelectorAll('.list-char');
const arrColors = ['red', 'green', 'yellow', 'pink', 'blue', 'orange'];
setInterval(() => {
    listTextChars.forEach((e, i) => {
        setTimeout(() => {
            let rdColors = Math.floor(Math.random() * 6);
            let rd = Math.floor(Math.random() * 20 - 10);
            e.style.transform = `translateY(${rd}px)`;
            e.style.color = `${arrColors[rdColors]}`;
        }, 1000)
    })
}, 1000)

let listTextUpdown = document.querySelector('#list-text-updown');
let listTextUpdown1 = document.querySelector('#list-text-updown1');
let a = "Ready For a Workout Revolution?".split(" ");
let b = "Why Our Online Training Is The Best?".split(" ");
a.forEach((e, i) => {
    let creListC = document.createElement("div");
    creListC.classList.add("list-char-updown");
    creListC.textContent = e;
    listTextUpdown.appendChild(creListC);
});
b.forEach((e, i) => {
    let creListC = document.createElement("div");
    creListC.classList.add("list-char-updown");
    creListC.textContent = e;
    listTextUpdown1.appendChild(creListC);
});
const listCharUpdown = document.querySelectorAll('.list-char-updown');
setInterval(() => {
    listCharUpdown.forEach((e, i) => {
        setTimeout(() => {
            let rdColors = Math.floor(Math.random() * 6);
            e.style.color = `${arrColors[rdColors]}`;
        }, i * 500);
    })
    for (let i = 0; i < listCharUpdown.length; i++) {
        listCharUpdown[i].style.color = `#183D3D`;
    }
}, 5000)

