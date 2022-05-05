<?php
class Email {
    public static function addEmail() {
        $userEmail = $_POST['useremail'];
        $emails = json_decode(file_get_contents("emails.json"));
        array_push($emails, $userEmail);
        $emails = json_encode($emails);
        file_put_contents('emails.json', $emails);
    }
}

Email::addEmail();
?>