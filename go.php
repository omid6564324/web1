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
$myfile = fopen("ghozarsh.txt", "r") or die("هیچ فروشی وجود نداشته");
$cont=0;
while (!feof($myfile)) {
$res = explode(';', fgets($myfile));
    $name[$cont]=trim($res[1]);
    //$name[$cont][0]=trim($res[1]);
   // $name[$cont][1]=trim($res[0]);

   $mablagh[$cont]=$res[0];
    $cont++;
}
array_pop($name);

array_pop($mablagh);

fclose($myfile);


require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/jdf.php';
date_default_timezone_set('Asia/Tehran');


$html= "<style>";
$html .= "table";
$html .= "{width:180px; }";
$html .= " td, th ,tr ,table{    border: 2px solid #dddddd;    text-align: center;     }";
$html .= "</style>";
$html .= "<table>";

$html .= "<tr>";
$html .= "<th colspan='4'>گزارش روز</th>";
$html .= "<tr>";
$html .= "<th colspan='4'>" .jdate('Y/m/d') . "</th>";
$html .= "<tr>";

$tedad=(array_count_values($name));
foreach($tedad as $key => $value)
{
      $html .= "<tr>";
		 
		$html .= " <td>";
         $html .= $key ;
        $html .= "</td>";
		 		 					 
        $html .= " <td>";
        $html .= convertNumbers ($value) ;
        $html .= "</td>";
}

      $html .= "<tr>";
		$html .= " <td>";
         $html .= "فروش";
        $html .= "</td>";
		 		 					 
        $html .= " <td>";
        $html .= convertNumbers( array_sum($mablagh) );
        $html .= "</td>";

		
$html .= "</table>";
$html .= "</style>";

$html .= "<br>";
$html .= "<br>";
$html .= ".";
echo $html;


function convertNumbers($srting,$toPersian=true)
{
    $en_num = array('0','1','2','3','4','5','6','7','8','9');
    $fa_num = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
    if( $toPersian ) return str_replace($en_num, $fa_num, $srting);
    else return str_replace($fa_num, $en_num, $srting);
}

    echo'   <a href="config\index.php">    <button class="button2">صفحه اصلی</button></a>';
	echo'   <a href="..\index.php">    <button class="button2">صفحه فروش</button></a>';
