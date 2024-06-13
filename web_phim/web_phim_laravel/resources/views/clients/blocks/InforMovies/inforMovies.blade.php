@extends('clients.layouts.home')
@php
    $title = request()->ten_phim;
@endphp
@section('content')
<div class="mainhome">
    <div class="thanvideo">
        <div class="thanc">
            <h3
                style="text-align: center; margin:20px 20px;padding: 5px ;color: yellow;background-color: #5C5470;border-radius: 5px;">
                {{request()->ten_phim}}
            </h3>
            <div class="Chinh" style="display: flex;">
                <div style="margin-left: 20px;">
                    <a href="{{ route('phim.ten_phim', ['ten_phim'=>request()->ten_phim]) }}">
                        <div class="slide_phim" style="height: 320px;background-color:#5C5470;border-radius:20px;">
                            <div class="slde">
                                <img class="lkphim" src="" alt="{{request()->ten_phim}}">
                            </div>
                        </div>
                    </a>
                </div>
                <div style="color: red;width: 100%;background-color: #5C5470;margin: 0 20px;border-radius: 10px;">
                    <ul
                        style="height: 320px;display: flex;flex-direction: column;align-items: stretch;justify-content: start;">
                        <li
                            style="position: relative;;text-align: left;color: #BFD8AF;padding: 20px;border-bottom: 2px solid #ffffff;">
                            Tập
                            <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);">
                                <span id="status-practice"></span> /
                                <span id="max-practice"></span>
                            </div>
                        </li>
                        <li
                            style="position: relative;;text-align: left;color: #BFD8AF;padding: 20px;border-bottom: 2px solid #ffffff;">
                            Xem phim
                            <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);">
                                <a href="{{request()->url()}}/1">
                                    <button title="Xem từ đầu"
                                    style="padding: 8px;border: 1px solid #ffffff;border-radius: 5px;background-color: none;">
                                    Xem từ đầu
                                    </button>
                                </a>
                                <a href="#" id="xem-moi-nhat">
                                    <button title="Xem mới nhất"
                                    style="padding: 8px;border: 1px solid #ffffff;border-radius: 5px;background-color: none;">
                                    Xem mới nhất
                                    </button>
                                </a>
                                @if(session()->has('islogedin'))
                                <button tt="" id="favourite-btn" title="Theo dõi"
                                    style="padding: 8px;border: 1px solid #ffffff;border-radius: 5px;background-color: none;">
                                    Theo dõi
                                </button>
                                @endif
                            </div>
                        </li>
                        <li 
                            style="position: relative;;text-align: left;color: #BFD8AF;padding: 20px;border-bottom: 2px solid #ffffff;">
                            Thể loại
                            <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);">
                                <button id="category"
                                    style="padding: 8px;border: 1px solid #ffffff;border-radius: 5px;background-color: none;">
                                </button>
                            </div>
                        </li>
                        <li 
                            style="position: relative;;text-align: left;color: #BFD8AF;padding: 20px;border-bottom: 2px solid #ffffff;">
                            Trạng thái
                            <div id="status-movie" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);">
                            </div>
                        </li>
                        <li 
                            style="position: relative;;text-align: left;color: #BFD8AF;padding: 20px;border-bottom: 2px solid #5C5470;border-radius: 20px;">
                            Năm
                            <div id="year-release" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div style="min-height: 350px;background-color: #404040;display: flex;">
                <div style="background-color: #5C5470;width: 450px;margin: 20px 5px 20px 20px;">
                    <h3 style="padding: 5px;border-bottom: 1px solid #ffffff;color: #FFFC9B;">Danh sách tập</h3>
                    <div id="danh-sach-tap-phim" style="margin: 20px 0;display: grid;grid-template-columns: repeat(4,70px);gap: 5px;place-content: center;"></div>
                </div>
                <div style="background-color: #5C5470;width: 100%;margin: 20px 20px;">
                    <h3 style="padding: 5px;border-bottom: 1px solid #ffffff;color: #FFFC9B;">Nội dung phim</h3>
                    <div style="margin-top: 20px;">
                        <p id="content-movie" style="text-align: start;margin: 0 10px;font-size: 18px;color: #E0CCBE;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        
        document.addEventListener('DOMContentLoaded', function () {
            let ten_phim = document.head.querySelector('title').innerHTML;
            let arr_list_phim = [];
            
            const timkiem = document.querySelector('.timkiemi')
            const listds = document.querySelector('.listds');
            let danhsach = document.querySelector('#danhsach');
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


            fetch('http://'+ window.location.host + '/api/listphimjson')
                .then(response => response.json())
                .then(data => {
                    for ($item in data.data) {
                        arr_list_phim = arr_list_phim.concat(data.data[$item].ten_phim);
                        
                    }
                    let infor_one_movie = [...data.data];
                    infor_one_movie.map(function (item,key) {
                        if (item.ten_phim === ten_phim) {
                            let favourite_btn = document.querySelector('#favourite-btn')
                            if(favourite_btn){
                                favourite_btn.setAttribute('tt',infor_one_movie[key].id_phim);
                            }
                            document.querySelector('#content-movie').innerText  = infor_one_movie[key].contents;
                            document.querySelector('.lkphim').src= infor_one_movie[key].link_anh_phim;
                            document.querySelector('#max-practice').innerText   = infor_one_movie[key].max_practice;
                            document.querySelector('#category').innerText   = infor_one_movie[key].category;
                            document.querySelector('#status-movie').innerText   = infor_one_movie[key].status_movie;
                            document.querySelector('#year-release').innerText   = infor_one_movie[key].year_release;
                            let tap_phim= infor_one_movie[key].status_practice;
                            document.querySelector('#status-practice').innerText   = tap_phim;
                            document.querySelector('#xem-moi-nhat').href= location.href +'/'+ tap_phim;
                            let danh_sach_tap_phim= document.querySelector('#danh-sach-tap-phim');
                            for(let i=1; i<=parseInt(tap_phim); i++) {
                                let a =document.createElement('a');
                                a.href = '/phim/' + infor_one_movie[key].ten_phim + '/' + i;
                                a.style.padding = '5px';
                                a.style.borderRadius = '5px';
                                a.style.border = '1px solid #ffffff';
                                a.style.backgroundColor='#ffffff';

                                let btn=document.createElement('button');
                                btn.style.border = 'none';
                                btn.style.outline = 'none';
                                btn.style.background = 'none';
                                btn.style.cursor = 'pointer';
                                btn.innerText= 'Tập ' + i;

                                a.append(btn);

                                danh_sach_tap_phim.append(a);
                            }
                        }
                    });
                })
                .catch(error => console.error('Error:', error));
                

            document.querySelector('.fa-magnifying-glass').addEventListener('click', () => {
                document.querySelector('.fa-magnifying-glass').style.display = 'none';
                document.querySelector('.timkiemi').style.display = 'block';
            })

            const favourite_btn = document.querySelector('#favourite-btn');
            const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
            if(favourite_btn && csrfToken){
                favourite_btn.addEventListener('click', () => {
                axios.post('/favourite', {
                    id_phim: favourite_btn.getAttribute('tt'),
                    _token: csrfToken
                })
                .then(e=> alert('Thêm yêu thích thành công'))
                .catch(e=> alert('Thất bại, vui lòng thử lại'))
                })
            }
        })
    </script>
@endsection