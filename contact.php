<?php

if(isset($_POST['message'])) {

   $retour = mail("timothy.gomis@gmail.com", "Message de mon site", $_POST['message'], "Reply-to:" . $_POST['email']);
   if ($retour) {
      echo "<p>L'e-mail à bien été envoyé</p>";
   }
}