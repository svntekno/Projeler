<!DOCTYPE html>
<html>
<body>

<canvas id="tuval" width="100" height="100" style="border:1px solid #000; border-radius: 200px">
Taray�c�n�z HTML5 i Desteklemiyor!
</canvas>

<script type="text/javascript">

var c = document.getElementById("tuval");
var g = c.getContext("2d");

// Dereceyi radyana �eviren fonksiyon.
function degToRad(val)
{
 // 1 derece = Pi / 180 radyand�r.
 return val * (Math.PI / 180); 
}

var x = c.width > c.height ? c.height : c.width; // Geni�lik - Y�kseklik Sabitleme

// Merkez nokta (a, b)
var a = x / 2;
var b = x / 2;

// Merkezi belirt
g.translate(a, b);

// Yuvarlak �izgi kenarlar�
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

/********* G�stergeleri �izen Fonksiyon **********/

function saat()
{
 // Zaman� ��ren
 var t = new Date();

 // Saniye, dakika ve saatin radyan t�r�nden a��lar�n� hesapla
 var sn = degToRad(6 * t.getSeconds());
 var dk = degToRad(6 * t.getMinutes() + t.getSeconds() / 10);
 var sa = degToRad(30 * t.getHours() + t.getMinutes() / 2);
 
 // Canvas boyutunu x de�i�kenine aktar
 x = c.width > c.height ? c.height : c.width;
 
 // G�stergeleri ekrandan temizle
 g.fillStyle ="#FFF";

 
 g.moveTo(0, 0);
 
 g.arc(0, 0, x * 0.4, 0, 2 * Math.PI, true);
 
 g.fill();
 
 // Tuvali saniye a��s� kadar �evir
 g.rotate(sn);
 
 // Saniye g�stergesi kal�nl���n� ayarla
 g.lineWidth = x * 0.0075;
 
 //�izime ba�la
 g.beginPath();
 
 // Saniye g�stergesini �iz.
 g.moveTo(0, 0);
 g.lineTo(0, -x * 0.375);
 g.stroke();
 
 // Tuvali normale d�nd�r
 g.rotate(-sn);
 
 // Yelkovan�n (dakika) kal�nl���n� ayarla
 g.lineWidth = x * 0.01;
 
 // �izime ba�la
 g.beginPath();
 
 // Tuvali dakika a��s� kadar d�nd�r.
 g.rotate(dk);
 
 // Yelkovan� (dakika) �iz.
 g.moveTo(0, 0);
 g.lineTo(0, -x * 0.325);
 g.stroke();

 // Tuvali normale d�nd�r.
 g.rotate(-dk);
 
 // Akrebin (saat) kal�nl���n� ayarla
 g.lineWidth = x * 0.02;
 
 // �izime ba�la
 g.beginPath();
 
 // Tuvali saat a��s� kadar d�nd�r
 g.rotate(sa);
 
 // Akrebi (saat) �iz
 g.moveTo(0, 0);
 g.lineTo(0, -x * 0.275);
 g.stroke();
 
 // Tuvali normale d�nd�r
 g.rotate(-sa);
 
 // Dolgu rengini ayarla
 g.fillStyle = "rgb(30,30,30)";
 
 // Saat cam�n�n tam ortas�na yar��ap� 10 olan bir daire �iz ve i�ini doldur
 g.moveTo(0, 0);
 g.arc(0, 0, 4, 0, 2 * Math.PI, true);
 g.fill();
 
 // Merkezi normale d�nd�r.
 g.translate(0, 0);
 
 // Bu fonksiyonu saniyede bir tekrarla.
 setTimeout("saat()", 1000);
}

// Sayfa y�klendi�i zaman saat fonksiyonunu �al��t�r.
window.onload = saat;
</script>

</body>
</html>