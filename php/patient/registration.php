<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Get_Doctors</title>
    <!-- Favicons -->
    <link href="../../assets/favicon/logo1.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap">

    <link rel="stylesheet" type="text/css" href="../../css/patient/registration.css">
</head>

<body>
    <?php
    session_start();

    // $_SESSION["userid"] = "";
    // $_SESSION["usertype"] = "";

    // Set the new timezone
    date_default_timezone_set('Asia/Kolkata');
    $today = date('Y-m-d');



    //import database
    include("../database_connection.php");

    if ($_POST) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobileno = $_POST['number'];
        $dob = $_POST['dob'];
        $bgroup = $_POST['bgroup'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $password = $_POST['password'];


        $checker = $db->query("select * from patient where PEMAIL='$email' and PPASSWORD='$password'");
        if ($checker->num_rows == 1) {
            $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
        } else {
            //TODO
            $db->query("insert into patient(PNAME, PPASSWORD, PEMAIL, PGENDER, PNUMBER, PADDRESS, PBLOOD_GROUP, PDATE_OF_BIRTH) values('$name','$password','$email','$gender','$mobileno','$address','$bgroup','$dob');");

            $query = "select * from patient where PEMAIL='$email' and PPASSWORD='$password'";
            $result = $db->query($query);
            $row = $checker->fetch_assoc();
            $_SESSION['userid'] = $row['PID'];
            $_SESSION['usertype'] = 'PATIENT';

            header('Location: ../login.php');
            $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
        }
    } else {
        //header('location: signup.php');
        $error = '<label for="promter" class="form-label"></label>';
    }

    ?>
    <center>
        <div class="container">
            <table border="0">
                <tr>
                    <td colspan="2">
                        <p class="header-text">Let's Get Started</p>
                        <p class="sub-text">Add Your Personal Details to Continue</p>
                    </td>
                </tr>
                <tr>
                    <form action="" method="POST">
                        <td class="label-td">
                            <label for="name" class="form-label">Name: </label>
                        </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="text" name="name" class="input-text" placeholder="Name" required>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="newemail" class="form-label">Email: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="email" name="email" class="input-text" placeholder="Email Address" required>
                    </td>

                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="number" class="form-label">Mobile Number: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="tel" name="number" class="input-text" placeholder="Phone Number" 
                      pattern="[0-9]{10}"   required>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="dob" class="form-label">Date of Birth: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="date" name="dob" class="input-text" required>
                    </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <label for="bgroup" class="form-label">Blood Group: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <select name="bgroup" id="" class="box" required>
                            <option value="" disabled selected>Select Blood Group</option>
                            <option value="A+">A+</option><br />
                            <option value="A-">A-</option><br />
                            <option value="B+">B+</option><br />
                            <option value="B-">B-</option><br />
                            <option value="AB+">AB+</option><br />
                            <option value="AB-">AB-</option><br />
                            <option value="O+">O+</option><br />
                            <option value="O-">O-</option><br />
                        </select><br><br>
                    </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <label for="gender" class="form-label">Gender: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <select name="gender" id="" class="box" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Male">Male</option><br />
                            <option value="Female">Female</option><br />
                            <option value="Other">Other</option><br />
                        </select><br><br>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="address" class="form-label">Address: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="text" name="address" class="input-text" placeholder="Address" required>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="password" class="form-label">Password: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="password" name="password" class="input-text" placeholder="Enter Password" required>
                    </td>
                </tr>
                <tr>

                    <td colspan="2">
                        <?php echo $error ?>
                        <!-- <?php echo 'kevin patel'; ?> -->

                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="reset" value="Reset" class="login-btn btn-primary-soft btn">
                    </td>
                    <td>
                        <input type="submit" value="Sign Up" class="login-btn btn-primary btn">
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                        <a href="../login.php" class="hover-link1 non-style-link">Login</a>
                        <br><br><br>
                    </td>
                </tr>

                </form>
                </tr>
            </table>

        </div>
    </center>
</body>

</html>