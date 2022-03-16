<?php
  require 'vendor/autoload.php';
  use \Mailjet\Resources;

  $mj = new \Mailjet\Client('14cd026903525eceeb9d0d46d44fc522','fdd8b56fa159abb6d3126b4f8e30bc18',true,['version' => 'v3.1']);

  if(!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['message'])) {
     $lastname = htmlspecialchars($_POST['lastname']);
     $firstname = htmlspecialchars($_POST['firstname']);
     $email = htmlspecialchars($_POST['email']);
     $message = htmlspecialchars($_POST['message']);

     if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $body = [
          'Messages' => [
            [
              'From' => [
                'Email' => "timothy.dev974@gmail.com",
                'Name' => "tim"
              ],
              'To' => [
                [
                  'Email' => "timothy.dev974@gmail.com",
                  'Name' => "tim"
                ]
              ],
              'Subject' => "contact portfolio",
              //'TextPart' => "My first Mailjet email",
              'HTMLPart' => "$email, $message",
              'CustomID' => "AppGettingStartedTest"
            ]
          ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();

        echo "Email envoyé avec succès !";
        header('refresh:3; url= https://timothy-gomis.go.yj.fr');

     } else {
        echo "email non valide";
        header('refresh:3; url= https://timothy-gomis.go.yj.fr');
     }
  }
?>



