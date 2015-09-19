<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title></title>
<style>
.bd{
	font-size:30px;
	
	
	color:#FFF;
	
	}
</style>
</head>
<body>




<?php

if ($dosya = (fopen ("deneme.txt" , 'r') ) ) {

}
else {
print ("Dosya açılamadı!");
}
while ( ! feof ($dosya) ) {
$satir = fgets ( $dosya, 1024);
echo"<marquee align='middle' direction='right'scrollamount='5'><b class='bd'>$satir</b><br/><br/></marquee>";

}

fclose ($dosya); 

?>

</body>
</html>