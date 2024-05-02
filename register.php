<?php 

include "connect.php";
$usernameErr="";$passwordErr="";
$username="";$password="";$email="";$number="";$nationality="";$date="";$gender=""; 
   
   

    if(isset($_POST['submit'])){
        $id="";
        $username = strtolower($_POST["username"]) ;
        $password = $_POST["password"];
        $hash = password_hash($password ,PASSWORD_DEFAULT );
       
        $sql = "INSERT INTO regtable VALUES
        ('$id','$username','$hash')";
        if(mysqli_query($conn, $sql)){
        }else{
            echo "ERROR: something went wrong!!!"
            .mysqli_error($conn);
        }
    }
    
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" > 

        <input type="text" name="username" placeholder="username" ><br>
        <div style="color: red; text-align:center;"><?php echo $usernameErr ?></div>
        <input type="password" name="password" placeholder="password" ><br>
        <div style="color: red; text-align:center;"><?php echo $passwordErr ?></div>
       
        <input type="submit" name="submit" value="submit"> <br>
    </form>
     
</body>
</html>