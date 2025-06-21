<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">


    <!-- Favicons -->
    <link href="../assets/favicon/logo1.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap">

    <title>Get_Doctors</title>



</head>

<body>
    <?php
    session_start();

    $_SESSION["userid"] = "";
    $_SESSION["usertype"] = "";
    //import database
    include("database_connection.php");

    if ($_POST) {
        $error = '<label for="promter" class="form-label"></label>';
        $useremail = $_POST['useremail'];
        $password = $_POST['password'];
        $utype = $_POST['usertype'];

        if ($utype == 'PATIENT') {
            //TODO
            $checker = $db->query("select * from patient where PEMAIL='$useremail' and PPASSWORD='$password'");
            if ($checker->num_rows == 1) {
                //   Patient dashbord
                // $query = "select * from patient where PNAME='$username' and PPASSWORD='$password'";
                // $result = $db->query($query);
                $row = $checker->fetch_assoc();
                $_SESSION['userid'] = $row['PID'];
                $_SESSION['usertype'] = $utype;
                header('location: patient/index.php');
            } else {
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Invalid Input</label>';
            }
        } elseif ($utype == 'ADMIN') {
            //TODO
            $checker = $db->query("select * from admin where AEMAIL='$useremail' and APASSWORD='$password'");
            if ($checker->num_rows == 1) {


                //   Admin dashbord
                $row = $checker->fetch_assoc();
                $_SESSION['userid'] = $row['AID'];
                $_SESSION['usertype'] = $utype;

                header('location: admin/index.php');
            } else {
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Invalid Input</label>';
            }
        } elseif ($utype == 'DOCTOR') {
            //TODO
            $checker = $db->query("select * from doctor where DEMAIL='$useremail' and DPASSWORD='$password'");
            if ($checker->num_rows == 1) {


                //   doctor dashbord
                $row = $checker->fetch_assoc();
                $_SESSION['userid'] = $row['DID'];
                $_SESSION['usertype'] = $utype;
                header('location: doctor/index.php');
            } else {
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Invalid Input</label>';
            }
        }
    } else {
        $error = '<label class="form-label">&nbsp;</label>';
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
                            <p class="sub-text">Login with your details to continue</p><br />
                        </td>
                    </tr>
                    <br />
                    <tr>
                        <form method="POST">
                            <td class="label-td">
                                <label for="username" class="form-label">User Email: </label>
                            </td>
                    </tr>
                    <tr>
                        <td class="label-td">
                            <input type="email" name="useremail" class="input-text" placeholder="User Email" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td">
                            <label for="userpassword" class="form-label">Password: </label>
                        </td>
                    </tr>

                    <tr>
                        <td class="label-td">
                            <input type="Password" name="password" class="input-text" placeholder="Password" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td">
                            <label for="usertype" class="form-label">User Type: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <select name="usertype" id="" class="box" required>
                            <option value="" disabled selected>Select User Type</option>
                                <option value="PATIENT">Patient</option><br />
                                <option value="DOCTOR">Doctor</option><br />
                                <option value="ADMIN">Admin</option><br />
                            </select><br><br>
                        </td>
                    </tr>

                    <tr>
                        <td><br>
                            <?php echo $error ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" value="Login" class="login-btn btn-primary btn">
                        </td>
                    </tr>
                </div>
                <tr>
                    <td>
                        <br>
                        <label for="" class="sub-text" style="font-weight: 280;">Don't have an account&#63; </label>
                        <a href="../php/patient/registration.php" class="hover-link1 non-style-link">Sign Up</a>
                        <br><br><br>
                    </td>
                </tr>




                </form>
            </table>

        </div>
    </center>
</body>

</html>