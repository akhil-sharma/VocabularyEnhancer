<?php
  if (session_status() !== PHP_SESSION_ACTIVE)
  {
    require('login.php');
  }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vocabulary Flash Cards</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link href="http://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css" rel="stylesheet" type="text/css">
<link href="dist/css/cardslider.css" rel="stylesheet">
<link href="demo.css" rel="stylesheet">
</head>
<body>
<div style="float:left">
  <form action="cms.php" method="POST">
    <input class="btn btn-default" type="submit" value="CMS" name='submit'/>
  </form>
</div>
<div style="float:right">
  <a href="logout.php"><button class="btn btn-default">Log Out</button></a>
</div>
  <?php
  include 'connection.php';

  // Create connection
$conn = new mysqli($host, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "";

$sql = "SELECT * FROM `main` ORDER BY `Word`";
 $result = $conn->query($sql);
if ($result->num_rows > 0) {
    
  ?>
<div class="my-slider">
  <ul>

    <?php 
      $count =1;
      while($row = $result->fetch_assoc()){
    ?>
    <li><?php echo $count.". ".$row["Word"];?> <br><hr>
        <?php echo $row["Meaning"];?>
        <?php $count=$count+1;?>
    </li>
    <?php
      }
      ?>

<li> Congratulations, You have reached the end.</li>
  </ul>
</div>

<?php
}
?>
<script src="http://code.jquery.com/jquery-2.2.3.min.js"></script> 
<script src="jquery.event.move.js"></script> 
<script src="jquery.event.swipe.js"></script> 
<script src="dist/js/jquery.cardslider.min.js"></script> 
<script>
			$('.my-slider').cardslider({
				swipe: true,
				dots: true
			});
		</script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>