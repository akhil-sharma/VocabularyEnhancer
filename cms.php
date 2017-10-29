<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
    <a href="index.php"><button class="btn btn-default">Main Page</button></a>
    <a href="logout.php"><button class="btn btn-default">Log Out</button></a>
</center>
<div class="container">
  <h2>Enter Words and there Meanings </h2>
  <form action="cms.php" method="POST">
    <div class="form-group">
      <label for="word">Word:</label>
      <input type="text" class="form-control" id="word" placeholder="Enter the word" name="word" required>
    </div>
    <div class="form-group">
      <label for="meaning">Meaning:</label>
      <textarea rows="10" class="form-control" id="meaning" placeholder="Enter the meaning" name="meaning" required></textarea>
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>



<!--upload file -->
<br><hr>
<div id="wrap">
        <div class="container">
            <div class="row">
 
                <form class="form-horizontal" action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>
 
                        <!-- Form Name -->
                        <legend>Upload csv</legend>
 
                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
 
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
 
                    </fieldset>
                </form>
 
            </div>
            
        </div>
    </div>
</body>

</html>

<?php
  

if(isset($_POST['word']) and isset($_POST['meaning'])){
  $word=$_POST['word'];
  $meaning = $_POST['meaning'];
  
  include 'connection.php';


  // Create connection
$conn = new mysqli($host, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "";

$sql = "INSERT INTO `main` (Word, Meaning) VALUES ('$word', '$meaning')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>