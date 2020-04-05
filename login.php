<?php
session_start();
if(isset($_POST['login'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!strlen($username) || !strlen($password)) {
        die('Please enter a username and password');
    }

    $success = false;

    $ext= '.csv';
    $file=$username.$ext;

    if(file_exists($file))

        {
            $handle = fopen($file, "r");
            if ($handle) {

                $data = fgetcsv($handle);


                while ($data !== FALSE) {
                    $user=$data[6];
                    $pass=$data[5];

                    if ($user == $username && $pass== $password) {
                        $success = true;
                        $_SESSION['user'] = $user;
                        //echo "<font color='green'>LOGIN SUCCESS</font>";
                        echo "<script>location.href='dashboard'</script>";
                        break;
                    }

                    else{
                        echo "<font color='red'>LOGIN FAILED ENTER A CORRECT EMAIL AND PASSWORD</font>";
                        break;
                    }
                }
                

                fclose($handle);

                if ($success) {
                    // they logged in ok
                } else {
                    // login failed
                }

            } else {
                    die("Unable to open file");
                }
            
            
            

        }

        else	{

            echo "<font color='red'>USER DOESN'T EXISTS</font>";

        }

    
}
?>
<title>login</title>
<h1 align="CENTER">Login in</h1>
<form method="post" ">
        <table id="table1" ; cellspacing="5px" cellpadding="5%" ; align="center">
            
            <tr>
                <td align="right">Username:</td>
                <td><input type="text" name="username" /></td>
                
            </tr>

            <tr>
                <td align="right">Password:</td>
                <td>
                    <input type="password" name="password" placeholder="Password"  />
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td>
                <input type="submit" value="Login" name="login" />
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="index.php">Register</a></td>
            </tr>

        </table>
        
    </form>