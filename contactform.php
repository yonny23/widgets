<?php include 'includes/config.php'?>
<?php get_header()?>

<?php
     if(isset($_POST['Name'])){
    //echo $_POST['FirstName'];
     
$to = 'yonatan.gebreyesus@seattlecolleges.edu';
$subject = 'Contact us today';
$message = 'hello from ' . $_POST['Name'];
$replyTo = 'yonatangebreyesus@gmail.com';
$headers = 'From: noreply@yonnythegreat.com' . PHP_EOL .
    'Reply-To: ' . $replyTo . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();
     
     echo '<p>Let us know if you had any additional questions</p>';
         '<p><a href="http://yonnythegreat.com/itc240/a2/">BACK</a></p>';
     
mail($to, $subject, $message, $headers);
     
}else{//show form
    echo '
        <form action="" method="post">
        <h1> Here is how you contact us!! </h1>
           First Name: <input type="text" name="Name" /><br />
           Last Name: <input type="text" name="name" /><br />
           Email: <input type="email" name="Email" /><br />
           <input type="submit" />
           </form>
        ';  
}
?>


    <!--[if ltIE9]>
       <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
     <![endif]-->
</head>
<?php get_footer()?>


