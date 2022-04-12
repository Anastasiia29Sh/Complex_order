<?php

// открываем сессию
session_start();

$title_date = 'Грузоперевозки, ' . date("d.m.Y");

# Если кнопка "Подтвердить заказ" нажата
if( isset( $_POST['confirm'] ) ){
	# Проверка на ввод всех данных
	if($_POST['name'] == "" || strlen($_POST['name']) == 1  || $_POST['email'] == "" || empty($_POST['document'])){

		$_SESSION['name'] = $_POST['name'] != "" && strlen($_POST['name']) != 1 ? $_POST['name'] : null;
		$_SESSION['email'] = $_POST['email'] != "" ? $_POST['email'] : null;
		
		$D = "Пожалуйста, введите все данные";

		include "..\pages\bill_2.htm";
	}
	
	else{
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['email'] = $_POST['email'];

		$document = "";
	
		foreach($_POST['document'] as $el){
			$document .= ($el == "invoice") ? "Накладная " : "";
			$document .= ($el == "check") ? "Товарный чек" : "";
		}
		$_SESSION['document'] = $document;


	# Отправка письма на почту
	$email = $_POST['email'];
	$name = $_SESSION['name'];
	// $subject = $title_date; //тема письма

	$message = $name . ',\r\n' . 'Груз принят в работу.\r\n' . 'Вам выставлен счет на ' . $_SESSION['price'] . '.\r\nДанные по грузу записаны в файл.\r\nИнформация отправлена на почту\r\n\r\n Форма отчета: ' .  $document;
	// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap
	$message = wordwrap($message, 70, "\r\n");

	// Отправляем
	mail($email, $subject, $message);

// 	// Подключаем библиотеку PHPMailer
// 	use PHPMailer\PHPMailer\PHPMailer;
// 	require 'PHPMailer/PHPMailer.php';
 
// 	// Создаем письмо
// 	$mail = new PHPMailer();
// 	$mail->setFrom('nastya.sharcko@yandex.ru', 'Шарко Анастасия'); // от кого (email и имя)
// 	$mail->addAddress($email, $name);  // кому (email и имя)
// 	$mail->Subject = $title_date;  // тема письма
// 	// html текст письма
// 	$mail->msgHTML("<html><body>
//                 <h1>Здравствуйте, $name!</h1>
//                 <p>Груз принят в работу.</p>
// 					 <p>Вам выставлен счет на $_SESSION['price']</p>
// 					 <p>Данные по грузу записаны в файл.</p>
// 					 <p>Информация отправлена на почту</p>
// 					 <p>Форма отчета: $document.</p>
//                 </html></body>");
// // Отправляем
// if ($mail->send()) {
//   echo 'Письмо отправлено!';
// } else {
//   echo 'Ошибка: ' . $mail->ErrorInfo;






	



	# запись информации в файл
	$file = fopen('../cargo.txt', 'a');

	$text = $name . ",\n" . "Груз принят в работу.\n" . "Вам выставлен счет на " . $_SESSION['price'] . ".\nДанные по грузу записаны в файл.\nИнформация отправлена на почту\n Форма отчета: " .  $document . "\n---------------------------------\n\n";
	fwrite($file, $text);

	fclose($file);

	session_destroy ();
	
	include "..\pages\basket.tpl";
	}
}
# Если кнопка "Вернуться к началу" нажата
if( isset( $_POST['back'] ) ){
	include "OrderProcessingBack.php";
}