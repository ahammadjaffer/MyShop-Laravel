<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MYSHOP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <script src = "/js/jquery.js"></script>
    <style>
    body {
            
            background:url('/uploads/userHomeBg.jpg')no-repeat;
            background-size:100%;
            height: 140px;
            display:block;
            padding:0 !important;
            margin:0;
         }
    .navbar-brand{
        font-family: 'Baloo Thambi', cursive;
        font-size:55px;
        }
    .c{
        color:#000;
    }
    .figure{
        border-radius:50%;
        overflow:hidden;
    }
    .clearBoth{
      clear: both;;
    }
    .name{
      font-size:55px;
      font-family: 'Kosugi Maru', sans-serif;
    }
    .details{
      font-size:20px;
      font-family: 'Kosugi Maru', sans-serif;
    }
    .aside{
      float:left;
      margin:25px;
    }
    .maindetails{
      float:left;
      margin:25px 35px;
    }
    .my{
		color:#CCD700;
    }
    .shop{
      color:#0099A5;
    }
    .chpr{
      margin:10px 20%;
      display:block;
    }
    .mainContent{
      float:left;
    }
    .menuGroup{
      float:right;
      margin:150px 0;
    }
    .bgr{
      width:250px;
      margin:3px 0;
    }
    .ico{
      width:35px;
      height:35px;
      margin:25px;
    }
    .ico:hover{
    }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand c" href="/userHome"><span class="my">My</span><span class="shop">Shop</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">Menu</span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link c" href="/userHome">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle c" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    
    <?php
      foreach($userData as $user)
      {
        $name = $user->userFullname;
        $img = $user->userImage;
      }
    ?>

    <form class="form-inline my-2 my-lg-0">
    <a class="nav-link c" href="#"><?php echo $name; ?> <img src="/uploads/<?php echo $img; ?>"width="30px"height="30px" alt="Img" class="figure"> <span class="sr-only">(current)</span></a>
    </form>
  </div>
</nav>
<div class="container">
  <div class="mainContent">
    <?php
      if(isset($userData))
      {
        foreach ($userData as $user) 
        {
          ?>
            <div class="aside">
              <img src="/uploads/<?php echo $user->userImage; ?>"width="250px"height="250px" alt="Img" class="figure">
              <br><a class="btn btn-primary btn-sm chpr" href="#" role="button">Change Profile Image</a>
            </div>
          <?php
          ?>
            <div class="maindetails">
              <p class="name"><?php echo $user->userFullname; ?></p> <?php
              ?><p class="details"><?php echo $user->userContact; ?></p> <?php
              ?><p class="details"><?php echo $user->placeName; ?></p> <?php
              ?><p class="details"><?php echo $user->districtName; ?></p> <?php
              ?><p class="details"><?php echo $user->stateName; ?></p> 
            </div>
            <div class="clearBoth"></div>
            
          <?php
        }
      }
    ?>
  </div>
  <div class="menuGroup">
    <i id="ico1" class="material-icons ico">shopping_cart</i><br>
    <p id="icon1"></p>
    <i id="ico2" class="material-icons ico">create</i><br>
    <p id="icon2"></p>
  </div>
  <div class="clearBoth"></div>
</div>

<script type="text/javascript">
$( "#ico1" ).hover(
  Msg1();
);
$( "#ico2" ).hover(
  Msg2();
);
function Msg1(){
  document.getElementById('icon1').innerHTML = '<strong>View Cart</strong>';
}
function Msg2(){
  document.getElementById('icon2').innerHTML = '<strong>Edit Profile</strong>';
}
</script>
</body>
</html>