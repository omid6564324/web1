<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="java.js"></script>

</head>
<body>
<header>
<?php
$A = $_GET['name1'];
$B = $_GET['name2'];

//echo $A;
//echo '<br>';
//echo $B;
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/jdf.php';
date_default_timezone_set('Asia/Tehran');

$myfile = fopen("ghozarsh.txt", "append") or die("فایل ایجادشد");

$txt2 = $A.';'.$B;
fwrite($myfile, $txt2);
fwrite($myfile, "\n");

     $mpdf = new \Mpdf\Mpdf(['default_font'=>'byekan', 'format'=>'A8','default_font_size'=>'9','setAutoBottomMargin'=>'stretch','margin_left'=>0, 'margin_right'=>0,'margin_top'=>0,'margin_bottom'=>0,'mgt'=>0,'mgt'=>0,'mgb'=>0]);

$html='<p style="text-align:center; line-height: 25px;padding: 0;margin: 0;">'.jdate('Y/m/d').'  '.jdate('l')."  :"."تاریخ" .'</p>';
$html.= '<h1 style="text-align:center;font-size: 35px; line-height: 25px;padding: 0;margin: 0;">'.$B.'</h1>';
$html.= '<h1 style="text-align:center;font-size: 25px; line-height: 20px;padding: 6;margin: 0;">'.convertNumbers($A).'</h1>';
$html.='<p style="text-align:center; line-height: 25px;padding: 0;margin: 0;">بلیط فقط در تاریخ بالا اعتبار دارد</p>';
$html.='<p style="text-align:center; line-height: 15px;padding: 0;margin: 0;">تا پایان بازی  کودکان خود را همراهی کنید</p>';
$html.='<p style="text-align:center; line-height: 25px;padding: 0;margin: 0;">به توصیه ها و هشدارها توجه کنید</p>';
$html.='<p style="text-align:center; line-height: 25px;padding: 0;margin: 0;">بلیط مخدوش یا پاره فاقد اعتبار است</p>';
$html.='<p style="text-align:center; line-height: 25px;padding: 0;margin: 0;">.</p>';


//echo $html;

$mpdf->WriteHTML($html );
//$mpdf->SetWatermarkText('استوره سازان');
//$mpdf->showWatermarkText = true;
       $mpdf->Output('m.pdf','F');
function convertNumbers($srting,$toPersian=true)
{
    $en_num = array('0','1','2','3','4','5','6','7','8','9');
    $fa_num = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
    if( $toPersian ) return str_replace($en_num, $fa_num, $srting);
    else return str_replace($fa_num, $en_num, $srting);
}


fclose($myfile);

$output = shell_exec('lp m.pdf');

   echo'   <a href="..\index.php">    <button class="button2">صفحه فروش</button></a>';
