<?php

// открываем сессию
session_start();

$title_date = 'Грузоперевозки, ' . date("d.m.Y");
$D = "";

include "..\pages\bill_2.htm";

