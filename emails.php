<?php

class Email {
    public static function addEmail() {
        // getting value from JS
        $userEmail = $_POST['useremail'];
        // checking if file exist
        try {
            $emails = json_decode(file_get_contents("emails.json")); 
        } catch (Exception $e){}  
        // few validations
        if (!strpos($userEmail, '@') || !strpos($userEmail, '.')) {
            exit('<p class="red">Įvestas e. pašto adresas turi turėti „@“ ir „.“ simbolius.</p>');
        }

        if (in_array($userEmail, $emails)){
            exit('<p class="red">Įvestas e. pašto adresas jau yra sąraše.</p>');
        }

        if (strpos($userEmail, '@') + 1 === strpos($userEmail, '.')) {
            exit('<p class="red">Taškas negali eiti po @ simbolio.</p>');
        }
        // if everything is okay - pushing to JSON
        if (file_exists('emails.json')) {
            array_push($emails, $userEmail);
            $emails = json_encode($emails);
            file_put_contents('emails.json', $emails);
            exit('<p class="green">Jūs sėkmingai užsiprenumeravote naujienlaiškį.</p>');
        } else {
            exit('<p class="red">Atsiprašome, įvyko klaida.</p>');
        }
    }
}

Email::addEmail();
?>