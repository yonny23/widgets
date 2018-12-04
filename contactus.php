<?php include 'includes/config.php'?>
<?php get_header()?>
<?php
 if(isset($_POST['Name'])){
    //echo $_POST['FirstName'];
     
     /*
     echo '<pre>';
     var_dump($_POST);
     echo '</pre>';
     die; 
     */
     
$to = 'yonatan.gebreyesus@seattlecolleges.edu';
$subject = 'Contact The Music Gurus';
$message = 'We are going to make sure you are taken care of. A message from ' . $_POST['Name'];
$replyTo = 'yonatangebreyesus@gmail.com';
$headers = 'From: noreply@yonnythegreat.com' . PHP_EOL .
    'Reply-To: ' . $replyTo . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();
     
     echo '<p>Thanks for contacting us today</p>'; 
        '<p><a href="http://yonnythegreat.com/itc240/a2/">BACK</a></p>';
     
mail($to, $subject, $message, $headers);
     
}else{//show form
    echo '
        <form action="" method="post" name="sentMessage" id="contactForm" novalidate>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" name="Name" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" id="email" name="Email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
     
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" class="form-control" placeholder="Message" id="message" name="Message" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            
                <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Options</label>
                What do you think we should add to our website? </br>
    <input type="checkbox" name="formDoor[]" value="A" />More content<br />
	<input type="checkbox" name="formDoor[]" value="B" />Better music<br />
    <input type="checkbox" name="formDoor[]" value="B" />Just stop putting music on the website<br />
    <input type="submit" name="formSubmit" value="Submit" />
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
            </div>
          </form>
        ';  
}
?>

   
    <!--[if ltIE9]>
       <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
     <![endif]-->
</head>
<?php get_header()?>



