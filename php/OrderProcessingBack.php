<?php

// открываем сессию
session_start();

# Если кнопка "Продолжить" нажата
if( isset( $_POST['back'] ) ){

	$D = "Пожалуйста, введите все данные";
	include "..\pages\order.htm";


}

