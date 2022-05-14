<!DOCTYPE html>
<html lang="fa">
    <meta charset="utf-8">
    <meta httphead-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="java.js"></script>
</head>
<body>
<div class="markaz">
    <?php
        $myfile = fopen("menu.csv", "r") or die("");
        $cont = 1;
        while (!feof($myfile)) {
            $res = explode(';', fgets($myfile));
		$name = http_build_query(array('name1' => $res[1], 'name2' => $res[0]));
		echo'   <a href=printpage.php?'.$name.'> <button class="button '. $res[2].'">'. $res[0].'  </button></a>';
    }
    fclose($myfile);
    ?>
</div>
</body>
</html>
