<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MYSHOP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        .registerbox{
            width:30%;
            position:relative;
            margin:auto;
            margin-top:150px;
        }
        input{
            width:100%;
            margin:5px;
        }
        .button{
            width:25%;
        }
        .heading{
            text-align:center;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="registerbox">
            <form action="/AddAdmin" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                <h2 class="heading">Register</h2>
                <input type="text" name="txtName" id="txtName" placeholder="Fullname" autofocus="autofocus"/><br>
                <input type="text" name="txtUsername" id="txtUsername" placeholder="Username"/><br>
                <input type="text" name="txtPassword" id="txtPassword" placeholder="Password"/><br>
                <input type="text" name="txtConfirmPassword" id="txtConfirmPassword" placeholder="Confirm Password" onblur="pswdCheck(this,txtPassword)"/>
                <input type="submit" name="btnSubmit" id="btnSubmit" value="Register" class="button btn btn-primary"/>
            </form>
            <a href="/adminLogin">Login</a>
        </div>
    </div>
</body>
</html>