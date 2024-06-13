<?php
include 'connect.php';

$arr_slide='SELECT * FROM `auto-slide`';
$arr_showslide=$conn->query($arr_slide);

$arr_phim='SELECT * FROM `phim`';
$arr_showphim=$conn->query($arr_phim);

$arr_view = 'SELECT * FROM `top-view`';
$arr_showview = $conn->query($arr_view);
$top_view = $arr_showview->fetch_all(MYSQLI_ASSOC);
usort($top_view, function($a, $b) {
    return $b['so-lg-view'] - $a['so-lg-view'];
});


// foreach ($top_view as $i) {
//     echo $i['id_phim'] . '<br>';
//     echo $i['ten_phim'] . '<br>';
//     echo $i['so-lg-view'] . '<br>';
// }

?>