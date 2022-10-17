<?php
 
//SIGNUP.PHP 
 
session_start();
require_once('auth.php');
#signup($_POST,'users.csv');
// if the user is alreay signed in, redirect them to the members_page.php page
// Single line if statement, no wrapping
if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) header('location: ../../index.php');
 
// use the following guidelines to create the function in auth.php
// instead of using "die", return a message that can be printed in the HTML page
$errorMessage = '';
if(count($_POST)>0){
    // check if the fields are empty
    if(isset($_POST['email']) || isset($_POST['password'])){
            // check if the email is valid
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                // check if password length is between 8 and 16 characters
                if(strlen($_POST['password']) >= 8 && strlen($_POST['password']) < 16){
                    // check if the password contains at least 1 special character
                    if(preg_match('@[^\w]@', $_POST['password'])){
                        //check if the file containing banned users exists
                        if(file_exists('../data/banned.csv.php')){
                            // check if the email has not been banned
                                // check if the file containing users exists
                                if(file_exists('../data/users.csv.php')){
                                    // check if the email is in the database already
                                    $fh = fopen('../data/users.csv.php', 'r');
                                    while($line = fgets($fh)){
                                        $line = trim($line);
                                        $line = explode(';', $line);
 
                                        if($line[0]==trim($_POST['email'])){
                                            $errorMessage = " Active account found, please sign in";
                                        } else {
                                            
                                        // encrypt password, save the user in the database, show them a success message and redirect them to the sign in page
                                        $fh=fopen('../data/users.csv.php', 'a+');
                                        fputs($fh,"\n".$_POST['email'].';'.password_hash($_POST['password'],PASSWORD_DEFAULT));
                                        fclose($fh);
                                        header('location: signin.php');
                                        die();
                                        }
                                        
                                    }                       
                                    
                                } else {
                                    $errorMessage = 'Something is wrong!';
                                    echo $errorMessage;
                                }
 
                        } else{
                            $errorMessage = 'Something is not right.';
                            echo $errorMessage;
                        }
                    } else{
                    $errorMessage = 'Please enter a special character';
                    echo $errorMessage;
                    }
                } else {
                    $errorMessage = 'Please enter a password >=8 characters';
                    echo $errorMessage;
                }
            } else {
                $errorMessage = 'Your email is invalid';
                echo $errorMessage;
            }
    } else{
        $errorMessage = 'Please enter your email and password';
        echo $errorMessage;
    }
}
 
// improve the form
?>
<h1>Sign Up</h1>
<a href="signin.php">Sign In Here</a>
<form method="POST"> 
    <input type="email" name="email" placeholder="Email"/>
    <input type="password" name="password" placeholder="Password" />
    <button type="submit">Create Account</button>
</form>