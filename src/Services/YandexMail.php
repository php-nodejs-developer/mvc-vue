<?php

namespace Mountains\Services;


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class YandexMail
{
    private $climberEmail;
    private $climberName;
    private $climberId;

    public function __construct($climberEmail, $climberName, $climberId)
    {
        $this->climberEmail = $climberEmail;
        $this->climberName = $climberName;
        $this->climberId = $climberId;
    }

    public function sentEmail()
    {
        $title = 'Регистрация в клубе альпинистов';
        $body = "
                <h2>Регистрация в клубе</h2>
                <p><b>Имя:</b> Администратор </p>
                <p><b>Почта:</b> admin@climbersclub.com </p> 
                <p>
                    <b>Сообщение:</b> 
                    $this->climberName, Вы успешно зерегистрированы в нашем клубе.
                    Вам уникальный номер: $this->climberId 
                </p> 
            ";
        $mailer = new PHPMailer();
        try {
            $mailer->isSMTP();
            $mailer->CharSet = "UTF-8";
            $mailer->SMTPAuth = true;

            $mailer->Host = 'smtp.yandex.ru'; // SMTP сервера почты отправителя
            $mailer->Username = 'byrtosha'; // логин на почте отправителя
            $mailer->Password = 'vgfohreyciziyxsm'; // пароль на почте отправителя
            $mailer->SMTPSecure = 'ssl';
            $mailer->Port = 465;
            // адрес почты и имя отправителя
            $mailer->setFrom('byrtosha@yandex.ru', 'ClimberClub Admin');

            // получатели письма
            $mailer->addAddress($this->climberEmail);

            //  прикрепление файлов к письму: $mailer->addAttachment($uploadfile, $filename);

            $mailer->isHTML(true);
            $mailer->Subject = $title;
            $mailer->Body = $body;

            // оправка
            return $mailer->send();
        } catch (Exception $exception) {
            return "Сообщение не было отправлено. Причина ошибки: $mailer->ErrorInfo";
        }
    }
}