<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/photo.css">


    <!-- Favicons -->
    <link href="../assets/favicon/logo1.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap">

    <title>Get_Doctors</title>



</head>

<body>

<?php
 //import database
 include("../database_connection.php");
 // session start
 session_start();

 if (isset($_SESSION["userid"])) {
     if (($_SESSION["userid"]) == "" or $_SESSION['usertype'] == "") {
         header("location: ../login.php");
     } else {
         $userid = $_SESSION["userid"];
     }
 } else {
     header("location: ../login.php");
 }
// Check if form is submitted
if (isset($_POST['submit'])) {

    // Check if file was uploaded without errors
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        // File upload path
        $targetDir = "../../assets/images/pimage/";
        // $targetDir = "";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Get the file type
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                // Insert image file name into database
                $insert = $db->query("update Patient SET PPHOTO= ' $fileName ' where PID=$userid");
                if ($insert) {
                    echo "File uploaded successfully.";
                    header("location: index.php");
                } else {
                    echo "File upload failed, please try again.";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed to upload.";
        }
    } else {
        echo "Error uploading file.";
    }
}
?>


    <center>
        <div class="container">
            <table border="0" style="margin: 0;padding: 0;width: 60%;">
                <tr>
                    <td>
                        <p class="header-text">Welcome Back!</p>
                    </td>
                </tr>
                <div class="form-body">
                    <tr>
                        <td>
                            <p class="sub-text"><U>Upload Your Image Here</U></p><br />
                        </td>
                    </tr>
                    <br />
                    <tr>
                        <form method="POST" enctype="multipart/form-data">
                            <td class="label-td">
                                <label for="photo" class="form-label">Select Photo </label>
                            </td>
                    </tr>
                    <tr>
                        <td class="label-td">
                            <input type="file" name="image" class="input-text" placeholder="Select Image" required>
                            <br/>
<br/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" name ="submit" value="Upload" class="login-btn btn-primary btn">
                        </td>
                    </tr>
                </div>
            </form>
            </table>

        </div>
    </center>
</body>

</html>