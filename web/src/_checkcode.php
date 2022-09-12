<?php

require_once '../setting/config.php';
require_once '../setting/tools.php';

$dash_color = HEX2RGB('#F6CC00'); //干擾線顏色
$text_color = HEX2RGB('#A7A7BC'); //文字顏色
$background_color = HEX2RGB('#ffffff'); //底色
$img_height = 30;  //圖片高度
$img_width = 50;   //圖片寬度
$mass = 50;       //圖片干擾點的數量
//驗證碼的數字，使用session儲存驗證碼
$num = '';           //驗證碼的數字
$num_max = 4;      //驗證碼數字的數量，目前設定6位數
for ($i = 0; $i < $num_max; $i++) {//亂數產生數字
    $num .= rand(0, 9);
    //srand((double) microtime() * 1000000);
}
setSession('web_checknum', $num);

$im = imagecreate($img_width, $img_height);
$dash = ImageColorAllocate($im, $dash_color['r'], $dash_color['g'], $dash_color['b']);
$text = ImageColorAllocate($im, $text_color['r'], $text_color['g'], $text_color['b']);
$background = ImageColorAllocate($im, $background_color['r'], $background_color['g'], $background_color['b']);
imagefill($im, 0, 0, $background);

// 隨機給予兩條虛線，起干擾作用
$style = array($dash, $dash, $dash, $dash, $dash, $background, $background, $background, $background, $background);
imagesetstyle($im, $style);
$y1 = rand(0, $img_height);
$y2 = rand(0, $img_height);
$y3 = rand(0, $img_height);
$y4 = rand(0, $img_height);
imageline($im, 0, $y1, $img_width, $y3, IMG_COLOR_STYLED);
imageline($im, 0, $y2, $img_width, $y4, IMG_COLOR_STYLED);

// 在圖形產上黑點，起干擾作用;
for ($i = 0; $i < $mass; $i++) {
    imagesetpixel($im, rand(0, $img_width), rand(0, $img_height), $dash);
}

// 將數字隨機顯示在圖形上,文字的位置都按一定波動範圍隨機生成
$strx = rand(3, 8);
for ($i = 0; $i < $num_max; $i++) {
    $strpos = rand(1, 8);
    imagestring($im, 5, $strx, $strpos, substr($num, $i, 1), $text);
    $strx += rand(8, 10);
}

// 創造圖片，定義圖形和文字顏色
Header('Content-type: image/PNG'); //這句是最重要的一句！
ImagePNG($im);
ImageDestroy($im);
?>