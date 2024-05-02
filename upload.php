<?php 

// Include the database configuration file 
include 'connect.php'; 
 
$statusMsg = ''; 
// File upload directory 
$targetDir = "images/"; 
 
if(isset($_POST["submit"])){ 
    
    $id = "";
    
 $title = $_POST['title'];
 $message = $_POST['message'];
    if(!empty($_FILES["file"]["name"])){ 
        $fileName = basename($_FILES["file"]["name"]); 
        $targetFilePath = $targetDir . $fileName; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
     
        // Allow certain file formats 
        $allowTypes = array('JPG','jpg','PNG','JPEG','GIF','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to server 
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                // Insert image file name into database 
                $insert = "INSERT INTO blogtable(picture,title,message) VALUES ('".$fileName."','".$title."','".$message."')"; 
                mysqli_query($conn,$insert);
                if($insert){ 
                    $statusMsg = " ".$fileName. " has been uploaded successfully."; 
                    header("location:index.php");
                }else{ 
                    $statusMsg = "File upload failed, please try again."; 
                }  
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet"  href="./css/style.css">
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data" class="login2">
    <p>Select Image File to Upload:</p>
    <input type="file" name="file"> <br>
    <input type="text" name="title" placeholder="title/caption"><br><br>
    <textarea name="message" placeholder="Enter text here..." cols="46" rows="10"></textarea> <br>
    <input type="submit" name="submit" value="Upload">
</form>

</body>
</html>