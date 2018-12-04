<?php
//customer_view.php - shows details of a single customer
?>
<?php include 'includes/config.php'?>
<?php get_header()?>

<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:music_list.php');
}


$sql = "SELECT * FROM music_list where MusicID = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $SongName = stripslashes($row['SongName']);
        $ArtistName = stripslashes($row['ArtistName']);
        $RecordLabel = stripslashes($row['RecordLabel']);
        $title = "Title Page for " . $SongName;
        $pageHeader = $SongName;
        //$Feedback = '';//no feedback necessary
    }    

} //else{//inform there are no records
    //$Feedback = '<p>This song does not exist</p>';


?>

<?php
    
    
//if($Feedback == 'This song doesn't exist)
{//data exists, show it

    echo '<p>';
    echo 'Song Name: <b>' . $SongName . '</b> ';
    echo 'Artist Name: <b>' . $ArtistName . '</b> ';
    echo 'Record Label: <b>' . $RecordLabel . '</b> ';
    
    echo '<img src="uploads/music' . $id . '.jpg" />';
    
    echo '</p>'; 
}//else{//warn user no data
    //echo $Feedback;
    

echo '<p><a href="music_list.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer()?>
