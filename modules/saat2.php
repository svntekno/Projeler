<!DOCTYPE html>
<html>
<body>

<canvas id="tuval" width="100" height="100" style="border:1px solid #000; border-radius: 200px">
Tarayýcýnýz HTML5 i Desteklemiyor!
</canvas>

<script type="text/javascript">

var c = document.getElementById("tuval");
var g = c.getContext("2d");

// Dereceyi radyana çeviren fonksiyon.
function degToRad(val)
{
 // 1 derece = Pi / 180 radyandýr.
 return val * (Math.PI / 180); 
}

var x = c.width > c.height ? c.height : c.width; // Geniþlik - Yükseklik Sabitleme

// Merkez nokta (a, b)
var a = x / 2;
var b = x / 2;

// Merkezi belirt
g.translate(a, b);

// Yuvarlak çizgi kenarlarý
g.lineCap = "round"; 

/*********** Saat Dekoru **********/

g.lineWidth = x * 0.0075;

for (i = 0; i < 60; i++)
{
 g.beginPath();
 
 g.moveTo(0, -x * 0.45);
 g.lineTo(0, i % 5 == 0 ? -x * 0.4 : -x * 0.425);
 g.stroke();

 g.rotate(degToRad(6));
}

/********* Göstergeleri Çizen Fonksiyon **********/

function saat()
{
 // Zamaný öðren
 var t = new Date();

 // Saniye, dakika ve saatin radyan türünden açýlarýný hesapla
 var sn = degToRad(6 * t.getSeconds());
 var dk = degToRad(6 * t.getMinutes() + t.getSeconds() / 10);
 var sa = degToRad(30 * t.getHours() + t.getMinutes() / 2);
 
 // Canvas boyutunu x deðiþkenine aktar
 x = c.width > c.height ? c.height : c.width;
 
 // Göstergeleri ekrandan temizle
 g.fillStyle ="#FFF";

 
 g.moveTo(0, 0);
 
 g.arc(0, 0, x * 0.4, 0, 2 * Math.PI, true);
 
 g.fill();
 
 // Tuvali saniye açýsý kadar çevir
 g.rotate(sn);
 
 // Saniye göstergesi kalýnlýðýný ayarla
 g.lineWidth = x * 0.0075;
 
 //Çizime baþla
 g.beginPath();
 
 // Saniye göstergesini çiz.
 g.moveTo(0, 0);
 g.lineTo(0, -x * 0.375);
 g.stroke();
 
 // Tuvali normale döndür
 g.rotate(-sn);
 
 // Yelkovanýn (dakika) kalýnlýðýný ayarla
 g.lineWidth = x * 0.01;
 
 // Çizime baþla
 g.beginPath();
 
 // Tuvali dakika açýsý kadar döndür.
 g.rotate(dk);
 
 // Yelkovaný (dakika) çiz.
 g.moveTo(0, 0);
 g.lineTo(0, -x * 0.325);
 g.stroke();

 // Tuvali normale döndür.
 g.rotate(-dk);
 
 // Akrebin (saat) kalýnlýðýný ayarla
 g.lineWidth = x * 0.02;
 
 // Çizime baþla
 g.beginPath();
 
 // Tuvali saat açýsý kadar döndür
 g.rotate(sa);
 
 // Akrebi (saat) çiz
 g.moveTo(0, 0);
 g.lineTo(0, -x * 0.275);
 g.stroke();
 
 // Tuvali normale döndür
 g.rotate(-sa);
 
 // Dolgu rengini ayarla
 g.fillStyle = "rgb(30,30,30)";
 
 // Saat camýnýn tam ortasýna yarýçapý 10 olan bir daire çiz ve içini doldur
 g.moveTo(0, 0);
 g.arc(0, 0, 4, 0, 2 * Math.PI, true);
 g.fill();
 
 // Merkezi normale döndür.
 g.translate(0, 0);
 
 // Bu fonksiyonu saniyede bir tekrarla.
 setTimeout("saat()", 1000);
}

// Sayfa yüklendiði zaman saat fonksiyonunu çalýþtýr.
window.onload = saat;
</script>

</body>
</html>