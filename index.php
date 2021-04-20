<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Validator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    
<div class="container mt-3">
  <h1>Email Validator</h1>
  <form action="" method="post">
  <div class="input-group mb-3">
    <input type="text" name="email" class="form-control" placeholder="Enter email">
    <div class="input-group-append">
      <button class="btn btn-success" name="submit" type="submit">Check Validity</button>  
     </div>
  </div>
  </form>
</div>

          <?php
           include('check.php');
           if(isset($_POST['submit'])){
               $email = $_POST['email'];
                $toemail = "arifulweb007@gmail.com"; //get admin email
                $results = verifyEmail($toemail, $fromemail, $getdetails = true);
                if ($results[0] == 'valid') {
                    $myfile = fopen("email_list.txt", "a") or die("Unable to open file!");
                    $txt = $toemail.",\n";
                    fwrite($myfile, $txt);
                    fclose($myfile);

                    $result = 'valid';
                } elseif ($results[0] == 'invalid') {
                    $result = 'invalid';
                } elseif ($results[0] == 'syntax') {
                    $result = 'syntax';
                } else {
                    $result = 'none';
                }
                // header('Content-Type: application/json');
                echo "<h4 align='center'>".$result."</h4>";
           }
           ?>
        
    
</body>
</html>