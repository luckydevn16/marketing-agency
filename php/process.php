<?php
ini_set("default_charset", 'utf-8');
date_default_timezone_set('Europe/Kiev');
//if ( function_exists( 'mail' ) )
//{
//    echo 'mail() is available';
//}
//else
//{
//    echo 'mail() has been disabled';
//}
$post = !empty($_POST);
if ($post) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sub = "Заявка с сайта Agency";
    $error = '';

    if (!$name) {
        $error .= 'Укажите ФИО. ';
    }
    if (!$email) {
        $error .= 'Укажите Email. ';
    }
    if (!$subject) {
        $error .= 'Укажите Subject. ';
    }

    if (!$error) {
        $address = "info@axela.uk";
//		$mes = "Имя: ".$name."\nФамилия: ".$surname."\nE-mail: ".$email."\nТелефон: ".$tel."\nID продукта: ".$productId."\n";
        $mes = "Дата: " . date('d.m.y H:i') .
            "\nИмя: " . $name .
            "\nEmail: " . $email .
            "\nSubject: " . $email .
            "\nСообщение: " . $message;
        $send = mail($address, $sub, $mes);
        if ($send) {
            echo 'success';
        } else {
            echo $error;
        }
    } else {
        echo $error;
    }
}
