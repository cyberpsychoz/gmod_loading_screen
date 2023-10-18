<?php

error_reporting(0);
@set_time_limit(8);

$r = mt_rand(1,8);

$authors = array(				//Песенки
    1 => 'NoName1',
    2 => 'NoName2',
    3 => 'NoName3',
    4 => 'NoName4',
    5 => 'NoName5',
    6 => 'NoName6',
    7 => 'NoName7',
    8 => 'NoName8',
);

$tips = array(					//Подсказки
    'Если противников больше и вас окружили - бегите.' => '1.gif',
    'Читайте книги, в них можно найти полезную информацию.'=> '7.gif',
    'Не пытайтесь пить из лужи, даже не думайте об этом.' => '1.gif',
    'Старая техника бесполезна, если вы не можете ее починить.' => '4.gif',
    'Со временем ваше оружие ломается, главное чтобы это не застало вас врасплох.' => '1.gif',
    'Старайтесь ходить группой, одному в пустоши не выжить.' => '10.gif',
    'Радиация хоть и не убьет вас, но сильно искалечит. Не испытывайте судьбу.' => '7.gif',
    'Не все проблемы можно решить кулаками. Старйтесь искать обходные пути.' => '5.gif',
    'Из бензина и апельсинового сока получается хороший напалм.' => '5.gif',
    'Силовая броня - экскалибур мира пустошей.' => '2.gif',
    'Если вы не умеете стрелять, никогда не поздно научиться рубить.' => '8.gif',
    'Используйте тостер только по назначению.' => '4.gif',
    'Слушайте тех, кто наставил на вас пушку. Особенно когда у вас ее нет.' => '6.gif',
    'Иногда лучше наблюдать со стороны, чем рисковать ради сомнительного результата.' => '9.gif'
);

function getRandomTip() {		//Функция берущая из массива одну рандомную подсказку
    global $tips;
    return $tips[array_rand($tips)];
}

$pictures = array();			//Функция берущая из массива одно рандомное изображение
for ($i = 1; $i <= 27; $i++) {
    $pictures[] = $i;
}

$keys = array_keys($tips);
shuffle($keys);		//Перемешать подсказки
shuffle($pictures); //Перемешать изображения

?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro">
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <script>
        var images = <?php echo json_encode($pictures); ?>;
        var tips = <?php echo json_encode($tips); ?>;
		var keys = <?php echo json_encode($keys); ?>;
		var tipIndex = 0;

		function changeBackground() {					//Рандомный бэкграунд
		    var randomIndex = Math.floor(Math.random() * images.length);
		    var imageUrl = "img/" + images[randomIndex] + ".jpeg";
		    document.body.style.backgroundImage = "url('" + imageUrl + "')";
		}

		function changeTip() {
		    var key = keys[tipIndex];
		    var tip = tips[key];
		    var gifUrl = "gifs/" + tip;
		    $("#tip").text(key);
		    $("#gif").attr("src", gifUrl);
		    tipIndex = (tipIndex + 1) % keys.length;
		}

		setInterval(changeTip, 47000); // меняет подсказку каждые 47 секунд
		setInterval(changeBackground, 47000); // меняет фон каждые 47 секунд
    </script>
</head>
<body onload="changeBackground(); changeTip();"> 
    <audio autoplay loop>
        <source src="music/<?php echo $r?>.ogg" type="audio/ogg">
    </audio>

    </div>
    <div style="position: absolute;bottom: 0px;left: 20px;font-size: 12px;min-width: 260px;" class="well well-sm">
        <img id="gif" src="gifs/pls.gif" style="width: 32px; height: 32px; margin-right: 10px;">
        <span id="tip" style="margin-right: 5px;">PLEASE STAND BY</span> 
    </div>
    <script src="js/vendor/jquery-1.10.1.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.cycle2.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
