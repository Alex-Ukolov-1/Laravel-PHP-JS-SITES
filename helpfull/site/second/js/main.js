var cart={};

//выбор действия в зависимости от результата
//в core.php
function init()
{
$.post("admin/core.php",
      {
        "action":"loadGoods"
      },
      goodsOut
	);
}

//функция вывода картинок 
function goodsOut(data)
{
	data=JSON.parse(data);
	console.log(data);
	var out='';
	for (var key in data) 
	{
		out +='<div id="div"  class="cart">'
   	out +=`<p class="name">${data[key].name}</p>`;
		out +=`<img id="geeks"   onclick="example(this)" src=dock/${data[key].img}" alt="">`;
		out +=`<div class="cost">${data[key].cost}</div>`;
		out +=`<button onclick="arc(this)"  class="add-to-cart" data-id="${key}">удалить</button>`;
		out +='</div>';
	}
	$('.goods-out').html(out);
}

 function arc() {
        var elem = document.getElementById('div');
        elem.style.display = "none";
    }
//функция для удаления




//функция для картинок
var t, a;
function example(e){
clearTimeout(t);
var w = e.width;
if (a) {
t = setInterval(function () {
if (w <= 450) clearTimeout(t);
e.style.cursor = 'zoom-in';
e.style.borderRadius = '1px';
e.style.boxShadow = '2px 2px 5px #fff'
e.width = w--;
}, 5);
}
else {
t = setInterval(function () {
if (w >= 650) clearTimeout(t);
// Стили на увеличение
e.style.cursor = 'zoom-out';
e.style.borderRadius = '5px';
e.style.boxShadow = '2px 2px 5px #888'
e.width = w++;
}, 5);
}
a = !a;
}


$(document).ready(function()
{
 init();
});


