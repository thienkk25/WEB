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
                {{request()->ten_phim}} tập {{request()->id_phim}}
            </h3>
            <div class="Chinh" style="display: flex;justify-content: center;align-items: center">
                <div style="margin-left: 20px;">
                    <iframe width="854" height="480" src="https://www.youtube.com/embed/nh2Q2J063Aw?si=YBJhE-6lfzeA_7Tg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            <div style="background-color: #404040;display: flex;margin: 5px 0; height: 30px;justify-content: center">
                <a id="prev-movies" href="#" style="margin: 0 10px; min-width: 70px;border-radius: 5px;border: 1px solid #ffffff;">
                    <button style="cursor: pointer;border: none;background-color: none;outline: none;height: 100%;width: 100%;">Tập trước</button>
                </a>
                <a id="next-movies" href="#" style="margin: 0 10px; min-width: 70px;border-radius: 5px;border: 1px solid #ffffff;">
                    <button style="cursor: pointer;border: none;background-color: none;outline: none;height: 100%;width: 100%;">Tập tiếp</button>
                </a>
            </div>
            <div style="min-height: 350px;background-color: #404040;display: flex">
                <div style="background-color: #5C5470;margin: 20px 20px;width: 100%">
                    <h3 style="padding: 5px;border-bottom: 1px solid #ffffff;color: #FFFC9B;">Danh sách tập</h3>
                    <div id="danh-sach-tap-phim" style="margin: 20px 0;display: grid;grid-template-columns: repeat(auto-fit,minmax(70px, 70px));gap: 5px;place-content: center;"></div>
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
                            let tap_phim= infor_one_movie[key].status_practice;
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

                                a.prepend(btn);

                                danh_sach_tap_phim.append(a);

                            }
                            let path = new URL(window.location.href)
                            let path_split = path.pathname.split('/');
                            let id_phim_page = path_split[path_split.length - 1];
                            if(id_phim_page === '1'){
                            document.querySelector('#prev-movies').href= '/phim/' + infor_one_movie[key].ten_phim + '/' + parseInt(id_phim_page);
                            document.querySelector('#prev-movies').style.opacity='.5'
                            }
                            else{
                            document.querySelector('#prev-movies').href= '/phim/' + infor_one_movie[key].ten_phim + '/' + (parseInt(id_phim_page) - 1);
                            document.querySelector('#prev-movies').style.opacity='1'
                            }
                            if(id_phim_page === tap_phim){
                            document.querySelector('#next-movies').href= '/phim/' + infor_one_movie[key].ten_phim + '/' + (id_phim_page);
                            document.querySelector('#next-movies').style.opacity='.5'
                            }
                            else{
                            document.querySelector('#next-movies').href= '/phim/' + infor_one_movie[key].ten_phim + '/' + (parseInt(id_phim_page) + 1);
                            document.querySelector('#next-movies').style.opacity='1'
                            }
                        }
                    });
                })
                .catch(error => console.error('Error:', error));
                

            document.querySelector('.fa-magnifying-glass').addEventListener('click', () => {
                document.querySelector('.fa-magnifying-glass').style.display = 'none';
                document.querySelector('.timkiemi').style.display = 'block';
            })
        })
    </script>
@endsection