<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MYSHOP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
    body {
            
            background:url('/uploads/bg.jpg')no-repeat;
            background-size:100%;
            height: 140px;
            display:block;
            padding:0 !important;
            margin:0;
         }
        .loginBox{
            width:30%;
            margin:auto;
            margin-top:150px;
        }
        input{
            margin:15px 0;
        }
        input:hover{
            border-color:#7166FE;
        }
        .heading{
            text-align:center;
            margin:25px;
        }
        </style>
</head>
<body>
    <div class="container">
        <div class="loginBox form-group">
            <h3 class="heading">Login</h3>
            <form action="/shopLoginCheck" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                <input type="text" name="userName" id="userName" class="form-control" placeholder="UserName">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <input type="submit" value="Login" class="btn btn-primary">
                <a href="/shopRegister">Register</a><br>
                <?php if(isset($msg)){?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $msg; }?>
                </div>
            </form>
        </div>
    </div>
</body>
</html>