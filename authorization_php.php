<?php

// открываем сессию
session_start();


# Если кнопка "Подтвердить заказ" нажата
if( isset( $_POST['go'] ) ){
	if($_POST['login'] == "" || $_POST['password'] == ""){

		$_SESSION['authorization'] = 'false';
		$D = "Пожалуйста, введите все данные";
		include "index.htm";
	}
	else{
		$_SESSION['authorization'] = 'true';
		$D = "Вы вошли как " . $_POST['login'];
		include "index.htm";
	}

}


