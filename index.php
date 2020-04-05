<?php
    $nameErr = $emailErr = $genderErr = $mobileErr= $passwordErr = $usernameErr = "";
    $f = $l = $m = $e = $p = $g = $u = "";
    


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
            if (empty($_POST["firstname"])) {
                $nameErr = "Name is required";
                
                //throwError("Please Fill in all the details");
                die("Please Fill in all the details");
                //session_destroy();
            }else {
                if(strlen(($_POST["email"]))>2){
                    $f = test_input($_POST["firstname"]);
                }
                else{
                    $nameErr = "Name is less than 2";
                }
                
                
            }
            

            if (empty($_POST["lastname"])) {
                $nameErr = "Name is required";
                
                 
                die("Please Fill in all the details");
            }else {
                
                $l = test_input($_POST["lastname"]);
            }
            if (empty($_POST["username"])) {
                $nameErr = "Username is required";
                
                 
                die("Please Fill in all the details");
            }else {
                
                $u = test_input($_POST["username"]);
            }

            if (empty($_POST["mobile"])) {
                $mobileErr = "Phone Number is required";
                $m = ""; 
                
               die("Please Fill in all the details");
            }else {
            
                $m = test_input($_POST["mobile"]);
            }

            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
                
                  
                die("Please Fill in all the details");
                 
            }else {
                            
            // check if e-mail address is well-formed
            if (filter_var($e, FILTER_VALIDATE_EMAIL)) {

                if(strlen(($_POST["email"]))>5){
                    $e = test_input($_POST["email"]);
                }
                else{
                    $emailErr = "Email less than 5"; 
                }
            }else{
                $emailErr = "Invalid email format"; 
                
                    
            }
            }
            
            if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
                
                 
                die("Please Fill in all the details");
                    
            }else {
                $p = test_input($_POST["password"]);
            }
            
            
            if (empty($_POST["gender"])) {
                $genderErr = "Gender is required";
                $g = "";
                 
                die("Please Fill in all the details");
                    
            }else {
                $g = test_input($_POST["gender"]);
            }
            

            $cvsData = $f.",".$l.",".$m.",".$e.",".$g.",".$p.",".$u;

            $ext= '.csv';

            $fn=$u;

            $file=$fn.$ext;

        

            if(file_exists($file))

            {

            echo "<font color='red'>USER ALREADY EXISTS</font>";

            }

            else	{

            $fo = fopen($file,"w");

            fwrite($fo,$cvsData);

            echo "<font color='green'>YOUR DATA IS SAVED</font>";

            }
            
            
            

                

    }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>


<html>
    <head>
         <style>
         .error {color: #FF0000;}
      </style>

    </head>
        
    <title>Register</title>
    <h1 align="CENTER">REGISTER</h1>
    <form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table id="table1" ; cellspacing="5px" cellpadding="5%" ; align="center">
            <tr>
                <td align="right">First Name:</td>
                <td><input type="text" name="firstname" placeholder="oyebayo" /></td>
                <td><span class="error">* <?php echo $nameErr;?></span></td>
            </tr>
            <tr>
                <td align="right">last Name:</td>
                <td><input type="text" name="lastname" placeholder="femi"/></td>
                <td><span class="error">* <?php echo $nameErr;?></span></td>
            </tr>

            <tr>
                <td align="right">Username:</td>
                <td><input type="text" name="username" placeholder="username"/></td>
                <td><span class="error">* <?php echo $usernameErr;?></span></td>
            </tr>
            <tr>
                <td align="right">Email:</td>
                <td><input type="email" name="email" placeholder="example12@example.com" /></td>
                <td><span class="error">* <?php echo $emailErr;?></span></td>
            </tr>
            <tr>
                <td align="right">Phone Number:</td>
                <td><input type="text" name="mobile" maxlength="11" placeholder="08012345678"/></td>
                <td><span class="error">* <?php echo $mobileErr;?></span></td>
            </tr>
            <tr>
                <td align="right">Gender</td>
                <td>
                    <select name="gender">
                    <option value="">Gender</option>
                    <option>male</option>
                    <option>female</option>
                    <option>Transgender</option>
                    </select><br />
                </td>
                <td><span class="error">* <?php echo $mobileErr;?></span></td>
            </tr>
            <tr>
                <td align="right">Password:</td>
                <td>
                    <input type="password" name="password" placeholder="Password"  />
                </td>
                <td><span class="error">* <?php echo $passwordErr;?></span></td>
            </tr>
            <tr>
                <td></td>
                <td>
                <input type="submit" value="Register" name="Register" />
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
                <td><a href="login.php">Login</a></td>
            </tr>

        </table>
        
    </form>


</html>
