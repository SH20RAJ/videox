<?php

include 'config.php';
include 'header.php';

$x = $_GET['x'] ;

$sql = "SELECT * FROM videos WHERE video_id = '$x' ";


$result = mysqli_query($conn,$sql);

// Numeric array
$row = mysqli_fetch_array($result, MYSQLI_BOTH);


$inviewsql = "UPDATE videos SET views = '" . $row['views'] . "'+1 WHERE video_id = '$x' ";
if(mysqli_query($conn,$inviewsql)){
}
// Free result set
mysqli_free_result($result);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['title'] ?></title>
    
    <link rel="stylesheet" href="css/viewx.css">
    <link rel="stylesheet" href="css/header.css">
    
  
  
    
</head>
<body style="display : block ">

	<div class="fullpage">
    <div class="vidcon">
    
          <video
            controls
            data-poster="<?php echo $row['thumburl'] ; ?>"
            id="player"
          >
            <!-- Video files -->
            <source
              src="<?php echo $row['videourl'] ; ?>"
              type="video/mp4"
              size=" "
            />
            <!--<source
              src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4"
              type="video/mp4"
              size="720"
            />
            <source
              src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4"
              type="video/mp4"
              size="1080"
            /> -->

            <!-- Caption files -->
            <track
              kind="captions"
              label="English"
              srclang="en"
              src=" "
              default
            />
            

            <!-- Fallback for browsers that don't support the <video> element -->
            <a href="<?php echo $row['videourl'] ; ?>" download>Download</a>
          </video>
        
		<br>
		
	</div>
  <hr>

 	 <div class="foot"> 
      <img src="logo.png" alt="<?php echo $row['user'] ; ?>"> 
      <span class="username"><?php echo $row['user'] ; ?><div id="verified"></div></span>
      <div class="blank2"> </div>   <div class="blank3"> </div> 
     </div> 

  <hr>

<div id="ddx">

  <button id="dd1" onclick="DisplayDesccription()">Show Description </button>
  <button id="dd2" style="display : none ;" onclick="HideDesccription()" >Hide Description </button>
  <a href="<?php echo $row['videourl'] ; ?>" download ><button id="dlbtn">Download</button></a> 
</div>
  <br />
  <hr />

  <div id="description">
  2 days ago  <br />
  <div class="tags"><?php echo $row['tags'] ; ?></div> <br>
  <?php echo $row['description'] ; ?> <br />
  
  </div>


  
  
	
    <div class="relatedvideos">
    <p> This is related videos </p>
	</div>

	</div>




<script>

	function DisplayDesccription(){
		document.getElementById('description').style.display = "block" ;
		document.getElementById('dd1').style.display = "none" ;
		document.getElementById('dd2').style.display = "flex" ;
	}
	function HideDesccription(){
		document.getElementById('description').style.display = "none" ;
		document.getElementById('dd2').style.display = "none" ;
		document.getElementById('dd1').style.display = "flex" ;

	}

</script>

</body>
</html>