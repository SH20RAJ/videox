
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php include 'config.php'; echo $sitename ?></title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
 <?php
include 'header.php';


//Running sql command ......... 
$sql = "SELECT * FROM videos WHERE sharing = 'public' ORDER by id desc limit 20" ;

$result = $conn->query($sql);


/*if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_array()) {   
     echo $row['id']  ;
  }
}else {
  echo "0 results found !!!!! ";
} */

?>

<div class="latest_vid_container">
     
     <?php
     if ($result->num_rows > 0) {
     while($row = $result->fetch_array()) {   
       echo '
     
    
       <div class="vid_con">
       <a href="viewx.php?x='.$row['video_id'].'">
 
         <div class="poster"> <img src="'.$row['thumburl'].'"></div>
             <div class="vid_foot">
                 <span class="vid_title">'.$row['title'].'</span></a> <br>
                  <span class="user">'.$row['user'].'</span> <span class="views"> '.$row['views'].' </span>
             </div>
     
       
     </div>

    ';
   }
  } else {
  echo "0 results found !!!!! ";
   }
     ?>


    </div> 

</body>
</html>


<?php
include 'footer.php';

?>
