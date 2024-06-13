const input_email = document.querySelectorAll('.main2-3-1-1-input');
const span_email = document.querySelectorAll('.main2-3-1-1-span');
const logout = document.querySelectorAll('.logout');
const manin_sign_in = document.querySelector('.manin-sign-in');
const manin_sign_up = document.querySelector('.manin-sign-up');
input_email.forEach((items, index) => {
    items.addEventListener('click', () => {
        span_email[index].style.fontSize = "14px";
        span_email[index].style.transform = "translateY(-10px)";
        items.style.borderBottom = "1px solid #116dff";
        items.style.zIndex = '0';
    });
    items.addEventListener('input', () => {
        span_email[index].style.fontSize = "14px";
        span_email[index].style.transform = "translateY(-10px)";
        items.style.borderBottom = "1px solid #116dff";
        items.style.zIndex = '0';
    });
    items.addEventListener('blur', () => {
        if (items.value === '') {
            span_email[index].style.fontSize = "17px";
            span_email[index].style.transform = "translateY(0px)";
            items.style.borderBottom = "1px solid #e6eaef";
            items.style.zIndex = '1';
        }
        else items.style.borderBottom = "1px solid #116dff";
    });
});
logout[0].addEventListener('click', () => {
    manin_sign_in.style.opacity = '0';
    manin_sign_in.style.zIndex = '1';
    manin_sign_up.style.opacity = '1';
    manin_sign_up.style.zIndex = '2';
    sessionStorage.setItem('tamthoi', JSON.stringify([0, 1, 1, 2]));
});

logout[1].addEventListener('click', () => {
    manin_sign_in.style.opacity = '1';
    manin_sign_in.style.zIndex = '2';
    manin_sign_up.style.opacity = '0';
    manin_sign_up.style.zIndex = '1';
    sessionStorage.setItem('tamthoi', JSON.stringify([1, 2, 0, 1]));
});
manin_sign_in.style.opacity = JSON.parse(sessionStorage.getItem('tamthoi'))[0];
manin_sign_in.style.zIndex = JSON.parse(sessionStorage.getItem('tamthoi'))[1];
manin_sign_up.style.opacity = JSON.parse(sessionStorage.getItem('tamthoi'))[2];
manin_sign_up.style.zIndex = JSON.parse(sessionStorage.getItem('tamthoi'))[3];
