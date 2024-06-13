<?php
include 'model/connect.php';
include 'header.php';
include 'model/add_phim.php';
?>
<div class="mainhome">
    <div class="dexuat">
        <div class="sildershower">
            
            <?php 
                while($i=$arr_showslide->fetch_array()){
                    echo '<div class="container"><img src="'.$i['link_anh'].'" alt="'.$i['ten_anh'].'" class="anhq "></div>';
                }
            ?>

        </div>
        <div class="dieuhuong dh1" id="dh">
            <div id="dhnx" class="button-next" onclick="next_pre(1)">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            
        </div>
        <div class="dieuhuong" id="dh">
            <div id="dhpr" class="button-pre" onclick="next_pre(-1)">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            
        </div>
    </div>
    <div class="thanvideo">
        <div class="thanc"><h3 style="text-align: start; margin:20px 0 20px 20px; color: yellow;">Đề xuất</h3>
            <div class="Chinh">
            <?php 
            while($i=$arr_showphim->fetch_array()){
            echo '<div class="slide_phim" style="height: 380px;background-color:#5C5470;border-radius:20px;">
            <div><div class="slde"><img class="lkphim" src="'.$i['link_anh_phim'].'" alt=""></div></div>
            <div style="width: 200px;color:#ffffff;margin:15px 0;">'.$i['ten_phim'].'</div>
            </div>';
            }
            ?>
        
            </div>
            <button id="Xemthem" style="padding: 10px;background-color: #7BD3EA;border-radius: 10px;margin: 20px 0;color:#451952">Xem thêm</button>
        </div>
        <div class="thant"><h3 style="color: yellow;margin:20px 0;">Xem nhiều</h3>
            <div class="Top">
                <?php 
                    foreach ($top_view as $i) {
                        echo '<div class="tp"><p class="pxm">'.$i['ten_phim'].'</p></div>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>