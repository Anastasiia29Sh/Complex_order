<?php

// открываем сессию
session_start();

echo isset($_SESSION['authorization']);

if(isset($_SESSION['authorization']) && $_SESSION['authorization'] == 'true'){
	$D = "";
	include "../pages/order.htm";
}
else{
	echo 'Вы не можете сделать заказ, надо авторизоваться<br>';
	echo '<a href="../index.htm">Назад</a>'; 
}