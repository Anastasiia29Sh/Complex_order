<?php

// открываем сессию
session_start();


# Если кнопка "Продолжить" нажата
if( isset( $_POST['next'] ) ){

# Проверка на ввод всех данных
if(empty($_POST['departure_port']) || empty($_POST['arrival_port']) || empty($_POST['loading']) || $_POST['count_25'] == null || $_POST['count_5'] == null || $_POST['count_10'] == null ) {

	
	$_SESSION['count_25'] = $_POST['count_25'] != null ? $_POST['count_25'] : null;
	$_SESSION['count_5'] = $_POST['count_5'] != null ? $_POST['count_5'] : null;
	$_SESSION['count_10'] = $_POST['count_10'] != null ? $_POST['count_10'] : null;

	$D = "Пожалуйста, введите все данные";
	include "..\pages\order.htm";
}else{
	
	$count_25 = $_POST['count_25'];
	$count_5 = $_POST['count_5'];
	$count_10 = $_POST['count_10'];
	$loading = $_POST['loading'];
	$day = $_POST['days_week'];
	$services = "";
	# общая цена
	$price = 0;
	# цена за тонну
	$price_t = 0;

	
	$departure_port = $_POST['departure_port'];
	$arrival_port = $_POST['arrival_port'];

	# цены по маршрутам 
	if($departure_port == "SPb" && $arrival_port == "Amsterdam"){
		$port = "Санкт-Петербург - Амстердам";
		$price_t += 200;
	}elseif($departure_port == "SPb" && $arrival_port == "Lisbon"){
		$port = "Санкт-Петербург - Лиссабон";
		$price_t += 400;
	}elseif($departure_port == "Sevastopol" && $arrival_port == "Amsterdam"){
		$port = "Севастополь - Амстердам";
		$price_t += 1000;
	}else {
		$port = "Севастополь - Лиссабон";
		$price_t += 600;
	}

	# цены на погрузку для каждого контейнера + учитывается день недели
	if($loading == "standard"){
		$loading = 'Стандартная';
		if($day != "Saturday" || $day != "Sunday"){
			# кол-во контейнеров * (вес 1 контейнера * цена за 1т + цена за погрузку)
		   $price += (int)$count_25*(2.5*(int)$price_t + 10) + (int)$count_5*(5*(int)$price_t + 20) + (int)$count_10*(10*(int)$price_t + 40);
		}else{
			$price += (int)$count_25*(2.5*(int)$price_t + 20) + (int)$count_5*(5*(int)$price_t + 40) + (int)$count_10*(10*(int)$price_t + 80);
		}

	}else{
		$loading = 'Не кантовать';
		if($day != "Saturday" || $day != "Sunday"){
			$price += (int)$count_25*(2.5*(int)$price_t + 30) + (int)$count_5*(5*(int)$price_t + 80) + (int)$count_10*(10*(int)$price_t + 150);
		}else{
			$price += (int)$count_25*(2.5*(int)$price_t + 60) + (int)$count_5*(5*(int)$price_t + 160) + (int)$count_10*(10*(int)$price_t + 300);
		}
		
	}

	# наценка на дополнительные услуги
	if(empty($_POST['services'])) {
		$services .= "нет";
	}else{
		foreach($_POST['services'] as $el){
			$services .= ($el == "insurance") ? "Расширенная страховка<br>" : "";
			$services .= ($el == "cargo") ? "Оформление грузов<br>" : "";
			$services .= ($el == "escort") ? "Юридическое сопровождение<br>" : "";

			$price += $el == "insurance" ? 10 : ($el == "cargo" ? 20 : ($el == "escort" ? 30 : 0));
		}	
	}


	$day = $day == "Monday" ? "Понедельник" : ($day == "Tuesday" ? "Вторник" : ($day == "Wednesday" ? "Среда" : ($day == "Thursday" ? "Четверг" : ($day == "Friday" ? "Пятница" : ($day == "Saturday" ? "Суббота" : ($day == "Sunday" ? "Воскресенье" : ""))))));


	


	$_SESSION['departure_port'] = $departure_port;

	$_SESSION['count_25'] = $count_25;
	$_SESSION['count_5'] = $count_5;
	$_SESSION['count_10'] = $count_10;
	$_SESSION['route'] = $port;
	$_SESSION['loading'] = $loading;
	$_SESSION['dop_services'] = $services;
	$_SESSION['price'] = $price;



	include "..\pages\bill_1.tpl";

}

}
# Если кнопка "Очистить" нажата
if( isset( $_POST['clear'] ) ){
	$_SESSION['count_25'] = null;
	$_SESSION['count_5'] = null;
	$_SESSION['count_10'] = null;
	$_SESSION['route'] = null;
	$_SESSION['loading'] = null;
	$_SESSION['dop_services'] = null;
	$_SESSION['price'] = null;
	$D = "";
	include "..\pages\order.htm";
}


