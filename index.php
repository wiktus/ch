<?php

require_once"log.php";
//require_once"function.php";
$lin = "home";
if (isset($_GET['link'])){
	$lin = $_GET['link'];
}
?>
<html>
<head>
<meta HTTP-EQUIV="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styl.css" type="text/css" />
<title><?=$tyt?></title>

</head>
	<body>
	<div id="wrap">
		<div id="main">
			<div id="banner">charmuszko.pl</div>
			<div id="menu">
				<?include "menu.php";?>
			</div>
			<div id="tresci">
			<? if (!empty($link)){	
					if (is_file("pages/$lin.php") ){
						include"pages/$lin.php";
					}else{
						echo "Nie ma takiej strony";
					}
				}else{
					include" pages/home.php ";
				}
				
			?>
			</div>
			<div id="footer"><?include "footer.php";?></div>
		</div>
	</div>
	</body>
</html>
