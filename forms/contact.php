<html>
  <body>
    <?php echo getenv('SMTP_PORT');exit; ?>
  </body>
</html>

<?php
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'sales@barbqnite.com';

  echo getenv('SMTP_PORT');
  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  $contact->smtp = array(
    'host' => 'smtpout.secureserver.net',
    'username' => 'sales@barbqnite.com',
    'password' => 'Zxcv##5689',
    'port' => '465'
  );  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
