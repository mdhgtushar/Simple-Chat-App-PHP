<?php
session_start();
if(isset($_SESSION['logedInUserId'])) {
    echo '<script>window.location.href = "chat.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Chat Home</title>
    <style>
        *{
            margin: 0;
            box-sizing: border-box;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .main-section{
            margin: 0 auto;
            max-width: 500px;
            border-left: 2px solid rgb(95, 95, 98);
            border-right: 2px solid rgb(95, 95, 98);
        }
        .info{
            padding: 5px 10px;
            overflow: hidden;
            border-bottom: 2px solid rgb(95, 95, 98);
            width: 100%;
        }
        .auth-btn{
            border-bottom: 2px solid rgb(95, 95, 98);
            padding: 10px;
        }
    </style>
</head>
<body>
    <section class="main-section">
        <div class="auth-sec">
            <div class="info">
                <h1>Mission Planners Team</h1>
            </div>
            <div class="auth-btn">
                <button onclick="getLogin()">Login</button>
                <!-- <button onclick="getSignup()">Sign Up</button> -->
            </div>
        </div>
        <div class="login info" id="login" style="display: none;">
            <h3>Please login</h3>
            <form action="" id="submitLogin">
                <input type="text" id="email" placeholder="Email">
                <input type="text" id="password" placeholder="Password" >
                <input type="submit" id="submit" value="Submit">
            </form>
        </div>
        <div class="login info" id="signup" style="display: none;">
            <h3>Please Signup</h3>
            <form action="">
                <input type="text" placeholder="Email">
                <input type="text" placeholder="Password" >
                <input type="button" value="Submit">
            </form>
        </div>
    </section>
<div id="Load"> </div>
    <script>
        var login = document.querySelector('#login');
        var signup = document.querySelector('#signup');
        function getLogin(){
            if(login.style.display == 'none'){
                login.style.display = 'block';
                signup.style.display = 'none';
            }
        }
         function getSignup(){
            if(signup.style.display == 'none'){
                login.style.display = 'none';
                signup.style.display = 'block';
            }
        }


         $('#submitLogin').submit(function(e){
            e.preventDefault()
            var email = $('#email').val();
            var password = $('#password').val();
            if(email != "" && password != ""){
                
            $.post('authAction.php' , {email:email, password:password}, function(data){
                $('#Load').html(data);
            })
            }
        })



    </script>
</body>
</html>