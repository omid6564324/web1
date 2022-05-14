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


$output = shell_exec('rm ghozarsh.txt');



   echo'   <a href="config\index.php">    <button class="button2">صفحه اصلی</button></a>';
   echo'   <a href="..\index.php">    <button class="button2">صفحه فروش</button></a>';
echo $output;