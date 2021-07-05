<?php
session_start();
if(!isset($_SESSION['logedInUserId'])) {
    echo '<script>window.location.href = "index.php";</script>';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Chat</title>
    <style>
    *{margin: 0;box-sizing: border-box;}
    body{font-family: Arial, Helvetica, sans-serif;}
    .main-section{margin: 0 auto;max-width: 500px;border-left: 2px solid rgb(95, 95, 98);border-right: 2px solid rgb(95, 95, 98);position: relative;overflow: hidden;}
    .p-10{padding: 10px;}
    .b-1{border-bottom: 2px solid rgb(95, 95, 98);}
    .msg p{font-size: 18px;}
    .msg small{font-size: 11px;}
    .send-box{border-top: 2px solid rgb(95, 95, 98);}
    .msg-room{height: 600px;overflow: scroll;background-color: #fff;}


    </style>
<script src="scroll.js"></script>
</head>
<body>
    <section class="main-section">
        <div class="p-10 b-1">
            <h1>Chat Room: Mission Planner 
                <a href="profile.php"> -me</a>
            </h1>
        </div>
        <div class="msg-room"  id="messages" onscroll="scrollMessages('messages')">
            <div id="Messages">Loading...</div>
         
        

        </div>
        <div class="p-10 b-1 send-box">
            <form action="" id="sendButton" >
                
            <input type="text" id="inputMsg" placeholder="Message..">
            <input type="submit"value="Send">
            </form>
        </div>
        <div id="sended"></div>
    </section>
    <script>
        $('#sendButton').submit(function(e){
            e.preventDefault()
            var Message = $('#inputMsg').val();
            if(Message != ""){
            $.post('chatAction.php' , {msg:Message}, function(data){
                $('#sended').html(data);
            })
            }
            document.getElementById('inputMsg').value = "";
        })

        setInterval(function(){
            $('#Messages').load('allMessages.php');
            
        },2000)
        
    </script>
</body>
</html>