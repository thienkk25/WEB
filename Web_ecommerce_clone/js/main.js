const slide = document.querySelector('.orgin-slide');
let clicksildel = document.querySelectorAll('.clickslidel');
let clicksilder = document.querySelectorAll('.clickslider');
let lenth = 1;
function autoslide() {
    let a = setInterval(() => {
        lenth++;
        if (lenth > 3) {
            lenth = 1;
        }
        if (lenth < 1) {
            lenth = 3;
        }
        slide.style.transform = `translateX(calc(-${lenth}* 1100px + 1000px))`;
    }, 10000);
    clicksildel.forEach((items) => {
        items.addEventListener('click', () => {
            if (lenth < 1) {
                lenth = 3;
            }
            slide.style.transform = `translateX(calc(-${lenth}* 1100px + 1000px))`;
            clearInterval(a);
            setTimeout(autoslide, 1000);
        });
    });
    clicksilder.forEach((items) => {
        items.addEventListener('click', () => {
            if (lenth > 3) {
                lenth = 1;
            }
            slide.style.transform = `translateX(calc(-${lenth}* 1100px + 1000px))`;
            clearInterval(a);
            setTimeout(autoslide, 1000);
        });
    });
};
autoslide();
const bar = document.querySelectorAll('.main1 div');
const clicks = [
    document.querySelector('.main3'),
    document.querySelector('.main5'),
    document.querySelector('.main6'),
    document.querySelector('.main9'),
    document.querySelector('.main10'),
    document.querySelector('.main11'),
    document.querySelector('.main12')
];
bar.forEach((element, index) => {
    element.addEventListener('click', () => {
        let offset = clicks[index].offsetTop;
        window.scrollTo({
            top: offset,
            behavior: 'smooth'
        });
    });
});