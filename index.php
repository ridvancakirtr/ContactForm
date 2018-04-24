<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
	<title>Software Engineering</title>
</head>
<body>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-lg-8">
				<h1>Software Engineering Contact Form</h1>
				<p class="lead text-primary">Please Enter This Sections</p>
				<form class="contact-validation" method="post" novalidate>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Name *</label>
							<input type="text" name="name" class="form-control" placeholder="Please enter your name *" required="required" />
							<div class="invalid-feedback">Please enter your name</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Email *</label>
							<input type="email" name="email" class="form-control" placeholder="Please enter a email *" required="required" />
							<div class="invalid-feedback">Please enter a email address</div>
						</div>
					</div>
				
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Subject *</label>
							<input type="text" name="subject" class="form-control" placeholder="Please enter a subject *" required="required" />
							<div class="invalid-feedback">Please enter subject</div>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label>Message *</label>
							<textarea name="message" class="form-control" placeholder="Message *" rows="4" required="required"></textarea>
							<div class="invalid-feedback">Please enter message</div>
						</div>
					</div>
				
					<div class="form-row">
						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-outline-success">Send Message</button>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<p class="text-secondary"><strong>*</strong>These fields are required</p>
						</div>
					</div>
				</form>
<?php
if($_POST){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "<script> alert('Enter valid email'); </script>";
                exit();
        }
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);
        //username = phpmailsender@yandex.com
        //password = cGhwbWFpbHNlbmRlcg==

        require("phpmailer/class.phpmailer.php");

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';//ssl
        $mail->Host = "smtp.yandex.com";//srvc184.turhost.com
        $mail->Port = 587; //465 for ssl
        $mail->IsHTML(true);
        $mail->SetLanguage("tr", "phpmailer/language");
        $mail->CharSet  ="utf-8";

        $mail->Username = "phpmailsender";//info@ridvancakir.com.tr
        $mail->Password = "cGhwbWFpbHNlbmRlcg==";//*********
        $mail->SetFrom("phpmailsender@yandex.com", $name);//info@ridvancakir.com.tr

        $mail->AddAddress($email); // Gönderilecek kişi

        $mail->Subject = $subject;
        $mail->Body = $message;

        if(!$mail->Send()){
                echo "Mailer Error: ".$mail->ErrorInfo;
        } else {
                echo "Message has been sent";
        }
}
?>

			</div>
		</div>
	</div>




	<style>
		.border-top { border-top: 1px solid #e5e5e5; }
		.border-bottom { border-bottom: 1px solid #e5e5e5; }
		.border-top-gray { border-top-color: #adb5bd; }
		.box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
		.lh-condensed { line-height: 1.25; }
	</style>
	<script>
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          var forms = document.getElementsByClassName('contact-validation');
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
</body>
</html>
