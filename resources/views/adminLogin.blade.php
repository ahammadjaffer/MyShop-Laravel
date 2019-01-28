<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MYSHOP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        <style>
        .heading{
            font-family: 'Love Ya Like A Sister', cursive;
        }
        .registerbox{
            width:30%;
            position:relative;
            margin:auto;
            margin-top:150px;
            padding:15px;
            box-shadow:0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        }
        input{
            width:100%;
            margin:5px 0;
            font-family: 'Lato', sans-serif;
        }
        .button{
            font-family: 'Lato', sans-serif;
            width:25%;
        }
        .button:hover{
            box-shadow:0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        }
        .heading{
            text-align:center;
        }
        
    </style>
</head>
<body>
<div class="container">
        <div class="registerbox">
            <form action="/login" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                <h2 class="heading">Login</h2>
                <div><i class="material-icons">person</i></div>
                <input type="text" name="txtUsername" id="txtUsername" placeholder="Username" class="form-control"/><br>
                <i class="material-icons">lock</i>
                <input type="text" name="txtPassword" id="txtPassword" placeholder="Password" class="form-control"/><br>
                <input type="submit" name="btnSubmit" id="btnSubmit" value="Login" class="button btn btn-primary"/>
                <?php if(isset($msg)) echo $msg; ?>
            </form>
        </div>
    </div>
</body>
</html>