<?php

//config
include"admin/config.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="refresh" content="120;URL=ccc/index.php">
	<title>jQuery Slider</title>
  	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/freelancer.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/sag.css" type="text/css" media="screen" />
  	<script type="text/javascript" src="js/jquery.js"></script>
  	<script type="text/javascript" src="js/scripts.js"></script>
  	<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/styled.css" type="text/css" media="screen" />

	<?php
	echo"
		<script type=\"text/javascript\">
    			if(!window.slider) 
				var slider={};

			slider.data=[

	";
		$query = mysql_query("SELECT * FROM galery ORDER BY RAND() LIMIT 5");

		$a=1;		
		$picture_name=array();

		while($row=mysql_fetch_array($query))
		{
			$picture_name[$a]=$row['picture_name'];
			
			if($a!=5)
				echo"
					{\"id\":\"slide-img-{$a}\",\"client\":\"{$row['title']}\",\"desc\":\"{$row['descr']}\"},
				";
			else
				echo"
					{\"id\":\"slide-img-{$a}\",\"client\":\"{$row['title']}\",\"desc\":\"{$row['descr']}\"}
				";	

			$a++;
		}
	echo"
		];
		</script>
	"
	?>

			


</head>
<body>



<div style="width:100%; height:80px; background-color:#0a294e;">
<ul>
<li>
<p class="p">GAZİANTEP ÜNİVERSİTESİ</p>
</li>
</ul>

<ul>
<li>
<p class="ps">NİZİP MESLEK YÜKSEKOKULU </p>
</li>
</ul>
</div>

<div id="banner">

<div class="">

<?php include('saat.php'); ?>
</div>

</div>
<div class="hv">
<?php include('modules/hava.php'); ?></div>


<!--banner arena finish-->





<!--banner arena finish-->

 
	<div id="header">
		<div class="wrap">
			<div id="slide-holder">
				<div id="slide-runner">

					<?php
						$a=1;
						foreach($picture_name as $picture)
						{
							$link=mysql_query("SELECT link FROM galery WHERE picture_name='$picture'");
							$link=mysql_result($link,0,'link');

							echo"
								<a href='$link' target='_new'>
									<img id='slide-img-{$a}' src='photos/{$picture}' class='slide' alt='' />
								</a>
							";
							$a++;
						}

					?>
	    				<!--^n_m^y^o^*2015*--><!--bilgisayar proramcılıgı (i.o)-->
    					
    					<div id="slide-controls">
     						<p id="slide-client" class="text"><strong>BAŞLIK: </strong><span></span></p>
     						<p id="slide-desc" class="text"></p>
     						<p id="slide-nav"></p>
    					</div>
				</div>
   			</div>
   		</div>
	</div>
	
	




	
<div class="pnl">
<div class="">
<?php include('modules/pano.php'); ?>
</div>
</div>


<div id="borsa">
<div class="brs">
<?php include('modules/trt.php'); ?>

</div>
</div>

<div id="eczex">
<div class="eczint">
<?php include('modules/eczane.php'); ?>
</div>
</div>

<div id="trh">
<div class="tarh">
<?php include('modules/tarih.php'); ?>
</div>
</div>



<!--/*
 * LCD PANO PHP PROJECT CREATED BY NMYO STUDENT 
 * Department computer programmer 
 * Copyright 2015 Web master: mustafa savun
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * 
 *TR
 *Bu web sayfası tasarımı ve kodlaması uluslarası isvicre federal
 *mahkemesi 2516 kanunu geregince kopyalanamaz veya dagıtılamaz tarafından korunmaktadır
 *MIT ve GPL lisansları kullanılmış olup açık kaynak kodlardan yaralanılmıştır.
 */-->


<!--
<div class="navbar navbar-default navbar-fixed-bottom">

<div class="container">

</div>
<a class="navbar-button">

</a>

</div>	
-->
 

<div id="duy">

<div class="dy">


<?php include('a.php');?>


</div>
</div>




</body>
</html>
