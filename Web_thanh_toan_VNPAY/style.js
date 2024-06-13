let thien1 = document.querySelectorAll(".card-img-top");
let thien2 = document.querySelectorAll("#monney");
let buy = document.querySelectorAll('#buy');
let thien3 = document.querySelector('#count-outside');
let thien4 = document.querySelector('#offcanvas-body-list');
let check = [];
for(let i = 0; i <buy.length; i++) {
    check[i] =false;
}
buy.forEach((element, index) => {
    element.addEventListener('click', () => {
        if (check[index] == false) {
            thien3.innerHTML = parseInt(thien3.innerHTML) + 1;
            let swap = document.createElement('li');
            swap.classList.add('list-group-item');
            swap.style.position = 'relative';
            swap.innerHTML = `
                <img class="card-img-top"
                        src="${thien1[index].src}"
                        alt="Haperger" style="width:20%;height: 20%;">
                    <span>${thien1[index].getAttribute('alt')} giá ${thien2[index].innerHTML}</span>
                    <input type="number" name="tenmon" prices="${thien2[index].getAttribute('price')}" rr="${index}" id="solg${index}" class="solg"
                        style="max-width:40px;position: absolute;right: 0;transform: translateY(-50%);top: 50%;"
                        min="0" value="1">`
            thien4.appendChild(swap);

            check[index] = true;
        }
        else {
            let solg = document.querySelector('#solg' + index);
            thien3.innerHTML = parseInt(thien3.innerHTML) + 1;
            solg.value = parseInt(solg.value) + 1;
        }
    });
});

document.querySelector('#shop-click').addEventListener('click', () => {
    let thien5 = document.querySelectorAll('.solg');
    let pay=0;
    for (let i = 0; i < thien5.length; i++) {
        pay += parseInt(thien5[i].value) * parseFloat(thien5[i].getAttribute('prices'));
    }
    document.querySelector('#tongtien').innerHTML = pay;

    thien5.forEach((element, index) => {
        let list_group_item = document.querySelectorAll('.list-group-item');
        element.addEventListener('blur', (e) => {
            if (element.value == 0) {
                list_group_item[index].remove();
                check[element.getAttribute('rr')] = false;
            }
            let thien5 = document.querySelectorAll('.solg');
            let sum = 0;
            let pay = 0;
            for (let i = 0; i < thien5.length; i++) {
                sum += parseInt(thien5[i].value);
                pay += parseInt(thien5[i].value) * parseFloat(thien5[i].getAttribute('prices'));
            }
            document.querySelector('#tongtien').innerHTML = pay;
            thien3.innerHTML = parseInt(sum);
        });
    });
});
document.querySelector('#pay').addEventListener('click', () => {
    let pay = 0;
    let thien5 = document.querySelectorAll('.solg');
    for (let i = 0; i < thien5.length; i++) {
        pay += parseInt(thien5[i].value) * parseFloat(thien5[i].getAttribute('prices'));
    }
    document.querySelector('#tongtien').innerHTML = pay;
    if (pay > 0) {
        window.location.href = 'http://localhost/Web_thanh_to%C3%A1n/vnpay_php/vnpay_pay.php?price='+pay;
    }else{
        alert('Bạn chưa chọn sản phẩm');
    }
})