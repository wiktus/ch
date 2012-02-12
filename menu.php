<?php

$menu = array('Home', 'Kontakt', 'Gmail',  );
?>
<?foreach($menu as  $nazwa):
	$link = str_replace(" ", "_", strtolower($nazwa)); ?>
	<span><a href="index.php?link=<?=$link?>"><?=$nazwa?></a></span>

<?endforeach?> 

