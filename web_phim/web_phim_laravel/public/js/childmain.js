
const size_slide = document.querySelectorAll('.slide_phim');
const unfavourite_phim = document.querySelectorAll('#unfavourite-phim');
const Xem_them = document.querySelector('#Xemthem');
if (size_slide.length > 10) {
    let show = 10;
    for (let i = show; i < size_slide.length; i++) {
        if (unfavourite_phim && unfavourite_phim[i] != undefined) unfavourite_phim[i].style.display = 'none';
        size_slide[i].style.display = 'none';
    }
    Xem_them.addEventListener('click', () => {
        for (let i = show; i < size_slide.length; i++) {
            if (unfavourite_phim && unfavourite_phim[i] != undefined) unfavourite_phim[i].style.display = 'block';
            size_slide[i].style.display = 'block';
        }
        Xem_them.style.display = 'none';
    });
}
else Xem_them.style.display = 'none';

let arr_list_phim = [];

const timkiem = document.querySelector('.timkiemi')
const listds = document.querySelector('.listds');
let danhsach = document.querySelector('#danhsach');
document.addEventListener('DOMContentLoaded', function () {
    timkiem.addEventListener('focus', () => {

        focusCallback();
        danhsach.style.zIndex = '10';
        danhsach.style.borderRadius = '10px';

        arr_list_phim.forEach(item => {
            let create_link = document.createElement('a');

            let create = document.createElement('li');
            create.style.margin = '10px';
            create.style.textAlign = 'start';
            create.innerHTML = item;

            create_link.appendChild(create);
            create_link.href = '/phim/' + item;

            listds.appendChild(create_link);
        })

        timkiem.addEventListener('input', e => {
            listds.innerHTML = '';
            let a = e.target.value.toLowerCase();
            let b = arr_list_phim.filter(i => i.toLowerCase().includes(a))
            b.forEach(item => {
                let create_link = document.createElement('a');

                let create = document.createElement('li');
                create.style.margin = '10px';
                create.style.textAlign = 'start';
                create.innerHTML = item;

                create_link.appendChild(create);
                create_link.href = '/phim/' + item;

                listds.appendChild(create_link);
            })
        })
    })

    function blurCallback() {
        danhsach.style.display = 'none';
        listds.innerHTML = '';
    }
    function focusCallback() {
        danhsach.style.display = 'block';
        listds.innerHTML = '';
    }
    danhsach.addEventListener('mouseover', () => {
        timkiem.removeEventListener('blur', blurCallback);
    });
    danhsach.addEventListener('mouseout', () => {
        timkiem.addEventListener('blur', blurCallback);
    });
    timkiem.addEventListener('blur', blurCallback);


    fetch('http://' + window.location.host + '/api/listphimjson')
        .then(response => response.json())
        .then(data => {
            for ($item in data.data) {
                arr_list_phim = arr_list_phim.concat(data.data[$item].ten_phim);
            }
        })
        .catch(error => console.error('Error:', error));

    document.querySelector('.fa-magnifying-glass').addEventListener('click', () => {
        document.querySelector('.fa-magnifying-glass').style.display = 'none';
        document.querySelector('.timkiemi').style.display = 'block';
    })
})