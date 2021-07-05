<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <h1>Mission Planner: HGT</h1>
            </div>
            <div class="auth-btn">
                <!-- <button onclick="cngName()">Change name</button>
                <button onclick="cngPass()">Change Password</button> -->
                <button><a href="logout.php">Logout</a></button>
            </div>
        </div>
        <div class="login info" id="cngName" style="display: none;">
            <h3>Change name</h3>
            <form action="">
                <input type="text" placeholder="enter a name">
                <input type="text" placeholder="Your password" >
                <input type="button" value="Submit">
            </form>
        </div>
        <div class="login info" id="cngPass" style="display: none;">
            <h3>Change password</h3>
            <form action="">
                <input type="password" placeholder="Old password">
                <input type="password" placeholder="New Password" >
                <input type="button" value="Submit">
            </form>
        </div>
    </section>

    <script>
        var cngNameBk = document.querySelector('#cngName');
        var cngPassBk = document.querySelector('#cngPass');
        function cngName(){
            if(cngNameBk.style.display == 'none'){
                cngNameBk.style.display = 'block';
                cngPassBk.style.display = 'none';
            }
        }
         function cngPass(){
            if(cngPassBk.style.display == 'none'){
                cngNameBk.style.display = 'none';
                cngPassBk.style.display = 'block';
            }
        }
    </script>
</body>
</html>