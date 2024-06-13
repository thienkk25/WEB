document.addEventListener('DOMContentLoaded', () => {
    // Hàm debounce để giảm số lần thực thi của hàm xử lý scroll
    function debounce(func, delay) {
        let timeoutId;
        return function () {
            const context = this;
            const args = arguments;
            clearTimeout(timeoutId);
            timeoutId = setTimeout(function () {
                func.apply(context, args);
            }, delay);
        };
    }

    // Hàm xử lý scroll với hiệu ứng transition và debounce
    const handleScroll = debounce(function () {
        const navbarHeader = document.querySelector(".navbar-header");
        const navHead = document.querySelector(".nav-head");
        if (window.scrollY > 90) {
            navbarHeader.style.position = "fixed";
            navbarHeader.style.width = "100%";
        } else {
            navbarHeader.style.position = "static";
        }
        if (window.scrollY > 130) {
            navHead.style.display = "none";
        } else {
            navHead.style.display = "block";
        }
    }, 50); // Thời gian chờ debounce, có thể điều chỉnh tùy theo nhu cầu

    // Gắn sự kiện scroll với hàm xử lý đã được debounce
    document.addEventListener("scroll", handleScroll);

    let zoomImage = document.querySelector("#zoomImage");
    let zoomImage1 = document.querySelector('#zoomImage1');
    let zoomImage2 = document.querySelector('#zoomImage2');
    let ShowZoom = document.querySelector('#ShowZoom');
    let ShowZoom1 = document.querySelector('#ShowZoom1');
    setTimeout(() => {
        zoomImage1.addEventListener('mousemove', (e) => {
            zoomImage2.style.display = 'block';
            ShowZoom.style.display = 'block';

            zoomImage2.style.left = (e.offsetX / (zoomImage1.offsetWidth * 1.8 - zoomImage2.offsetWidth)) * 100 + '%';
            zoomImage2.style.top = (e.offsetY / (zoomImage1.offsetHeight * 1.8 - zoomImage2.offsetHeight)) * 100 + '%';
            zoomImage2.style.display = 'block';

            ShowZoom1.style.transform = 'scale(3)';
            ShowZoom1.style.transition = 'all 0.2s ease';
            ShowZoom1.style.left = (1 - (e.offsetX / (zoomImage1.offsetWidth - zoomImage2.offsetWidth)) - e.offsetX / (zoomImage1.offsetWidth * 1.8 - zoomImage2.offsetWidth)) * 100 + '%';
            ShowZoom1.style.top = (1 - (e.offsetY / (zoomImage1.offsetHeight - zoomImage2.offsetHeight)) - e.offsetY / (zoomImage1.offsetHeight * 1.8 - zoomImage2.offsetHeight)) * 100 + '%';
        });

        zoomImage.addEventListener('mouseover', () => {
            zoomImage2.style.display = 'block';
            ShowZoom.style.display = 'block';
        });
        zoomImage.addEventListener('mouseout', () => {
            zoomImage2.style.display = 'none';
            ShowZoom.style.display = 'none';

        });

    }, 200);

    let listSlideZoomImage = document.querySelectorAll('.swiper-slide-zoom swiper-container swiper-slide img');
    zoomImage1.src = listSlideZoomImage[0].getAttribute('src');
    ShowZoom1.src = listSlideZoomImage[0].getAttribute('src');
    listSlideZoomImage[0].style.border = '3px solid blue';
    listSlideZoomImage.forEach((item) => {
        item.addEventListener('click', () => {
            for (let i = 0; i < listSlideZoomImage.length; i++) {
                listSlideZoomImage[i].style.border = 'none';
            }
            zoomImage1.src = item.getAttribute('src');
            ShowZoom1.src = item.getAttribute('src');
            item.style.border = '3px solid blue';
        });
    });
    let btnSaveLocation = document.getElementById('btn-save-location');
    let inputLocation = document.getElementById('input-location');
    let showLocation = document.getElementById('show-location');
    btnSaveLocation.addEventListener('click', () => {

        showLocation.innerHTML = inputLocation.value + " " + "Huyện ..." + " " + "Xã ...";
    });

    let xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        let lction = document.querySelector('#locations');
        if (xml.readyState == 4 && xml.status == 200) {
            let data = JSON.parse(xml.responseText);
            let province_names = data.results.map((item) => item.province_name);
            for (let i = 0; i < province_names.length; i++) {
                let locations = document.createElement('option');
                locations.value = province_names[i];
                lction.appendChild(locations);
            }
        }
    }
    xml.open("GET", "https://roller-dice-online.000webhostapp.com/api/", true);
    xml.send();

    let btnViewMore = document.getElementById("btn-view-more");
    let btnViewLess = document.getElementById("btn-view-less");
    let detailBlur = document.getElementById('detail-blur');
    let detailProduct = document.querySelector('#detail-product');
    let footer = document.getElementById('footer');
    detailProduct.style.overflow = "hidden";
    btnViewLess.style.display = "none";
    btnViewMore.addEventListener("click", function () {
        btnViewLess.style.display = "block";
        btnViewMore.style.display = "none";
        detailProduct.style.overflow = "none";
        detailProduct.style.height = "100%";
        detailBlur.style.backgroundImage = "none";
        footer.style.marginTop = "40px";
    });
    btnViewLess.addEventListener("click", function () {
        btnViewLess.style.display = "none";
        btnViewMore.style.display = "block";
        detailProduct.style.overflow = "hidden";
        detailProduct.style.height = "700px";
        detailBlur.style.backgroundImage = "linear-gradient(to bottom,transparent,rgba(255,255,255,0.9))";
        footer.style.marginTop = "0px";
    });
});