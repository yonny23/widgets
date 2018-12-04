<?php include 'includes/config.php'?>
<?php 
/*
if it's today, show $today's songs 
if day is passed via GET, show $day's song
place a link to show today's coffee (if on another day)
*/

$day = date('l');

if(isset($_GET['day']))
{//if day is passed via GET, show $day's song
    $day = $_GET['day'];
    
}
else{//if it's today, show $day's song 
$day = date('l');

}

switch($day){
        
    case 'Monday':
        $song = "Nas with his famous song The World is Yours  ";
        $pic = 'worldyours.jpg';
        $alt = 'Off one of the best albums of all-time Illmatic, Nas blessed us with a classic here';
        break;   
        
    case 'Tuesday':
        $song = "Travis Scott x Drake with their new hit Sicko Mode";
        $pic = 'travisndrake.jpg';
        $alt = 'An iconic duo by two of the greatest musicians of our era';
        break;
        
    case 'Wednesday':
        $song = "Jay-z Can I live";
        $pic = 'reasonabledoubt.jpg';
        $alt = 'Jay-z off his debut album Reasonable doubt gives us real words with his sample credited to Isaac Hayes';
        break; 
        
    case 'Thursday':
        $song = "Kanye West Never Let Me Down";
        $pic = 'collegedropout.jpg';
        $alt = 'In his debut album, Kanye explains how he will never let his mother down';
        break; 
        
    case 'Friday':
        $song = "Notorious BIG Poppa";
        $pic = 'notorious.jpg';
        $alt = 'Everybody knows the phrase "I love it when you call me big Papa" well guess where it originated from';
        break;
        
    case 'Saturday':
        $song = "Lil Wayne I Miss my Dawgs";
        $pic = 'thecarter.jpg';
        $alt = 'One of the greatest debut albums of all-time';
        break; 
        
        case 'Sunday':
        $song = "2pac To Live and Die in LA";
        $pic = 'laking.jpg';
        $alt = '2pac explains to his love for the city of Angel with this laid back tune.';
        break; 
        
        
        
}
    
    

//$day = date('l');

//echo $day;
//die;

?>

<?php get_header()?>

<p><?=$day?>'s special song is <?=$song?></p>

<p><?=$alt?></p>
<img src="images/<?=$pic?>" alt="<?$alt?>" id="music" />
<p>Click below to find out what the song of the day is</p>

<p><a href="daily.php?day=Sunday">Sunday</a></p>
<p><a href="daily.php?day=Monday">Monday</a></p>
<p><a href="daily.php?day=Tuesday">Tuesday</a></p>
<p><a href="daily.php?day=Wednesday">Wednesday</a></p>
<p><a href="daily.php?day=Thursday">Thursday</a></p>
<p><a href="daily.php?day=Friday">Friday</a></p>
<p><a href="daily.php?day=Saturday">Saturday</a></p>

<?php get_footer()?>


