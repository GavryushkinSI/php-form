 <?php
	// пример использования SendMailSmtpClass.php
if($_SERVER["REQUEST_METHOD"] == "POST"){
     

	require_once "SendMailSmtpClass.php"; // подключаем класс
	
	$mailSMTP = new SendMailSmtpClass('parsesignal@yandex.ru', 'aspeka25y', 'ssl://smtp.yandex.ru', 465, "UTF-8");

	
        $email = $_POST['email'];
	$title=$_POST['title'];
        $message=$_POST['message'];
        
	// от кого
	$from = array(
		"Запрос с сайта Parse_Signal", // Имя отправителя
		$email // почта отправителя
	);
	// кому отправка. Можно указывать несколько получателей через запятую
	$to = 'parsesignal@yandex.ru';
	
	// добавляем файлы
	//$mailSMTP->addFile("test.jpg");
	//$mailSMTP->addFile("test2.jpg");
	//$mailSMTP->addFile("test3.txt");
	
	// отправляем письмо
	$result =  $mailSMTP->send($to, $title, $message, $from); 
	// $result =  $mailSMTP->send('Кому письмо', 'Тема письма', 'Текст письма', 'Отправитель письма');
	
	if($result === true){
		echo "<center>Спасибо за отправку вашего сообщения! Наши специалисты свяжутся с вами.</center>";
	}else{
		echo "<center><b>Ошибка. Сообщение не отправлено! Проверьте правильность введенных данных</b></center>";
	}
}
	
?>