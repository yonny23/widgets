<?php
/*
config.php

stores configuration information for our web application

*/

//removes header already sent errors
ob_start();

define('SECURE',false); #force secure, https, for all site pages

define('PREFIX', 'widgets_fl18_'); #Adds uniqueness to your DB table names.  Limits hackability, naming collisions

//header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching

define('DEBUG',true); #we want to see all errors

include 'credentials.php';//stores database info
include 'common.php';//stores favorite functions

//prevents date errors
date_default_timezone_set('America/Los_Angeles');

//create config object
$config = new stdClass;

//CHANGE TO MATCH YOUR PAGES

$config->nav1['contactus.php'] = 'Contact Us';
$config->nav1['contactform.php'] = 'Contact Form';
$config->nav1['daily.php'] = 'Daily Page';
$config->nav1['music_list.php'] = 'My Top 20';


//create default page identifier
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//START NEW THEME STUFF - be sure to add trailing slash!
$sub_folder = 'widgets/';//change to 'widgets' or 'sprockets' etc.
$config->theme = 'Brick';//sub folder to themes

//will add sub-folder if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
//force secure website
if (SECURE && $_SERVER['SERVER_PORT'] != 443) {#force HTTPS
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}else{
    //adjust protocol
    $protocol = (SECURE==true ? 'https://' : 'http://'); // returns true
    
}
$config->virtual_path = $protocol . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;

define('ADMIN_PATH', $config->virtual_path . 'admin/'); # Could change to sub folder
define('INCLUDE_PATH', $config->physical_path . 'includes/');


//CHANGE ITEMS BELOW TO MATCH YOUR SHORT TAGS
$config->title = THIS_PAGE;
$config->banner = 'MUSIC'; //originally was Widgets 
$config->loadhead = '';//place items in <head> element

//default page values

$config->siteName = 'I love music';
$config->slogan = 'You Love music we GOT your back';
$config->pageHeader = 'Music makes the world go around';
$config->subHeader = 'Who loves music!!!';
$config->sloganIcon ='';//will be replaced in contact.php by hero icons

/*
switch(THIS_PAGE){
        
    case 'contact.php':    
        $config->title = 'Contact Page';    
    break;
    
    case 'appointment.php':    
        $config->title = 'Appointment Page';
        $config->banner = 'Widget Appointments!';
    break;
        
   case 'template.php':    
        $config->title = 'Template Page';    
    break; 
        
        
        
        
}

*/

switch(THIS_PAGE){
   
    case 'contactus.php';
		$config->title = 'Give us feedback';
        $config->pageHeader = 'Please do we are very nice';
        $config->subHeader = 'Check to see if you can contact us';
	break;
	
    case 'contactform.php';
		$config->title = 'Contact your boys';
        $config->pageHeader = 'hit us up we do not bite';
        $config->subHeader = 'We are special folks';
	break;
        
	case 'daily.php';
		$config->title = '7 days a week';
        $config->pageHeader = 'Weekly chart hits';
        $config->subHeader = 'Bless your Ears';
        //$config->sloganIcon = randomize($heros);
	break;
        
    case 'music_list.php';
        $config->title = 'My favorite songs ever';
        $config->pageHeader = 'The goat songs';
        $config->subHeader = 'Bless your Ears';
    break;

	
}

//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . 'themes/' . $config->theme . '/';

/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
if(startSession() && isset($_SESSION['AdminID']))
{#add admin logged in info to sidebar or nav
    
    $config->adminWidget = '
        <a href="' . ADMIN_PATH . 'admin_dashboard.php">ADMIN</a> 
        <a href="' . ADMIN_PATH . 'admin_logout.php">LOGOUT</a>
    ';
}else{//show login (YOU MAY WANT TO SET TO EMPTY STRING FOR SECURITY)
    
    $config->adminWidget = '
        <a  href="' . ADMIN_PATH . 'admin_login.php">LOGIN</a>
    ';
}



/*

makeLinks() will create navigation from an array
echo makeLinks($nav1);

' . xxx . ' 
*/

function makeLinks($nav)
{
    
    $myReturn = '';
    foreach($nav as $key => $value){
        if(THIS_PAGE == $key)
        {//current page! add active class
            $myReturn .= '    
        <li class="nav-item">
              <a class="nav-link active" href="' . $key . ' ">' . $value . ' </a>
            </li>';
        
            
            
        }else{//add no formatting
        $myReturn .= '    
        <li class="nav-item">
              <a class="nav-link" href="' . $key . ' ">' . $value . ' </a>
            </li>';
        
        
        
    }
        }
    return $myReturn;
}

?>