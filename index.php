<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet"  href="./css/style.css">

    <script src="https://use.fontawesome.com/1dfdf7e8fe.js">

</script>

</head>
<body>
    <header>
        <nav>
            <ul>
                <li><i class="fa fa-facebook" aria-hidden="true"></i>
</li>
                <li><i class="fa fa-twitter" aria-hidden="true"></i>
</li>
                <li><i class="fa fa-instagram" aria-hidden="true"></i>
            </li>
                <li><i class="fa fa-whatsapp" aria-hidden="true"></i>
            </li>
            </ul>
        </nav>
        <div class="admin"><a href="admin.php">Admin</a></div>
    </header>
    <div class="container1">
        <div class="blog_name">Food Blog</div>
        <div class="nav-2">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">Features</a></li>
                <li><a href="">Recipes</a></li>
                <li><a href="">Reviews</a></li>
                <li><a href="">Contact</a></li> 
            </ul>
        </div>
    </div>
    <div class="container2">
        
    </div>
    
<?php
// Include the database configuration file
include 'connect.php'; 

// Get images from the database
$query ="SELECT * FROM blogtable ";
$result = mysqli_query($conn,$query);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $imageURL = 'images/'.$row["picture"];
?>
    <img src="<?php echo $imageURL; ?>" alt="pic" class="img" /><br>
    <p class="title"><?php echo $row['title']; ?></p>
   <p class="message"><?php echo $row['message']; ?></p>
    
    
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>
    
</body>
</html>