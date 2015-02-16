<?php if( $_POST[ 'send' ] && $_POST[ 'username' ] && $_POST['email'] &&  $_POST[ 'messagetext' ] ) {
    
    $username = $_POST['username'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $skypeicq = $_POST['skypeicq'];
    $url = $_POST['url'];
    $phone = $_POST['phone'];
    $messagetext = $_POST['messagetext'];  
     
	$subject = 'Сообщение, отправленное через форму обратной связи';

	$message = '<html><body>Отправитель: '.$username.'<br/>
							Город: '.$city.'<br/>
							E-mail: '.$email.'<br/>
							Skype/ICQ: '.$skypeicq.'<br/>
							Адрес ВКонтакте: '.$url.'<br/>
							Контактный телефон: '.$phone.'<br/><br/>
							Текст сообщения: '.$messagetext.'<br/><br/>'
							.date("d.m.Y G:i:s").'</body></html>';

	$headers  = "Content-type: text/html; charset=UTF-8 \r\n";
	$headers .= "From: ".$username." <".$email.">";

    mail(/*сюда вписать e-mail, на который информация должна отправляться (в кавычках)*/, $subject, $message, $headers); ?>
    <script type="text/javascript">
    alert("Сообщение отправлено!");
    window.history.back(); // автоматически возвращаемся обратно на страницу, на которой были
    </script>   
   	<?php } 
   	else if( $_POST[ 'send' ] ) { ?>
   	<script type="text/javascript">
   	alert("Сообщение не отправлено! Заполните Ваше имя, e-mail и текст сообщения!");
   	window.history.back(); // автоматически возвращаемся обратно на страницу, на которой были
   	</script>
   	<?php }

?>