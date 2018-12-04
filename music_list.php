<?php
//customer_list.php - shows a list of customer data
?>

<?php include 'includes/config.php'?>
<?php get_header()?>

<?php
$sql = "SELECT * FROM music_list";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        echo '<p>';
        echo 'Song Name: <b>' . $row['SongName'] . '</b> ';
        echo 'Artist Name: <b>' . $row['ArtistName'] . '</b> ';
        echo 'Record Label: <b>' . $row['RecordLabel'] . '</b> ';
        
        echo '<a href="music_view.php?id=' . $row['MusicID'] . '">' . $row['SongName'] . '</a>';
        
        echo '</p>';
    }    

}else{//inform there are no records
    echo '<p>There are currently no songs</p>';
}

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer()?>
