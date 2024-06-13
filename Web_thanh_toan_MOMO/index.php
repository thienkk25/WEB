<?php
require_once ('connection.php');
require_once ('product.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Web thanh toán</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f2f2f2;
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container text-center my-3">
        <h1>Demo mua hàng</h1>
    </div>
    <div class="container text-center my-1" style="position: relative;">
        <div class="text-end">
            <i id="shop-click" data-bs-toggle="offcanvas" data-bs-target="#shop" class="fa-solid fa-bag-shopping"
                style="font-size: 40px;cursor: pointer;"></i>
            <span id="count-outside" class="badge bg-danger" style="position: absolute;">0</span>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" id="shop">
        <div class="offcanvas-header">
            <h1 class="offcanvas-title">Giỏ hàng</h1>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="alert alert-info">
        Tổng tiền: <span id="tongtien">0</span> VNĐ
        </div>
        <div class="offcanvas-body">
            <ul class="list-group" id="offcanvas-body-list">

            </ul>
        </div>
        <div class="offcanvas-footer">
            <div class="row">
                <div class="col">
                    <button type="button" id="pay" class="btn btn-primary" style="width: 100%;">Thanh toán</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-secondary" style="width: 100%;"
                        data-bs-dismiss="offcanvas">Hủy</button>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="container">
            <div class="d-flex flex-wrap">
                <?php
                while($element=$product->fetch_array()){
                    echo '
                    <div class="card mx-1" style="width:300px;">
                        <img class="card-img-top"
                            src="'.$element['link_image'].'"
                            alt="'.$element['name_product'].'" style="width:100%;height: 100%;">
                        <span price="'.$element['price_product'].'" id="monney" class="text-center">'.$element['price_product'].' VNĐ</span>
                        <button id="buy" type="button" class="btn btn-primary">
                            Mua hàng
                        </button>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <script>
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
                        min="0" max="99" value="1">`
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
        window.location.href = 'http://localhost/Web_thanh_toan_MOMO/atm_momo.php?price='+pay;
    }else{
        alert('Bạn chưa chọn sản phẩm');
    }
})
    </script>
</body>

</html>