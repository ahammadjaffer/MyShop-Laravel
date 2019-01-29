<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MYSHOP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Raleway" rel="stylesheet">
    <script src = "/js/jquery.js"></script>
    <style>
        .box{
            width:30%;
            margin-top:50px;
        }
        input, .psetpr{
            margin:10px;
        }
        #passwordForm{
            display: none;
        }
        .set{
            font-family: 'Oswald', sans-serif;
        }
        .pr{
            font-family: 'Raleway', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>MyShop</h2>
        <div class="box">
        <p class="psetpr"><span class="set">Settings</span> <span class="pr">> Password Reset</span></p>
            <form action="/CheckUserExists" method="post" id="userNameForm">
            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                <input type="text" id="username" name="username" class="form-control form-control-sm" placeholder="User Name">
                <input type="submit" class="btn btn-outline-primary btn-sm" value="Confirm">
            </form>

            <form action="/changeUserPassword" method="post" id="passwordForm">
            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
            <input type="hidden" name="hidUserName" value="<?php if(isset($userName)){echo $userName;} ?>">
                <input id="np" class="form-control form-control-sm" type="text" name="p1" placeholder="New Password" >
                <input id="cp" class="form-control form-control-sm" type="text" name="p2" placeholder="Confirm Password" >
                <input type="submit" class="btn btn-outline-primary btn-sm" value="Confirm">
                <span id='message'></span>
            </form>
        </div>
    </div>



<?php
    if(isset($userExists))
    {
        if($userExists==true)
        {
            ?>
            <script type="text/javascript">
            
                //alert('a');
                $( "#passwordForm" ).show( "slow", function() {
                    // Animation complete.
                });
                $( "#userNameForm" ).hide( "slow", function() {
                    // Animation complete.
                });
            
            </script>
            <?php
        }
    }
?>


<script type="text/javascript">
    $('#np, #cp').on('keyup', function () {
  if ($('#np').val() == $('#cp').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>
</body>
</html>