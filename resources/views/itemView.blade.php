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
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit|Maven+Pro" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
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
    aside{
        width:25%;
        height:550px;
        border-radius:15px;
        margin:15px;
        background:#f2f2f2;
    }
    aside{
      float:left;
    }
    .main{
      background:url('/uploads/viewItembg.jpg')no-repeat;
      background-size:100%;
      float:left;
      position:relative;
      margin:auto;
      margin:15px;
      width:70%;
    }
    .clearBoth{
      clear: both;;
    }
    .card{
      font-family: 'Montserrat', sans-serif;
      font-size:15px;
      width:30%;
      height:300px;
      float:left;
      border:none;
    }
    .card:hover{
      background:#f2f2f2;
      transform:scale(1.01, 1.01);
      z-index:11;
      border-radius:5px;
      box-shadow:0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }
    .fig{
      border-radius:5px;
      float:left;
    }
    .itemDetail{
      float:left;
    }
    .itemName{
      font-family: 'Kanit', sans-serif;
    }
    .p{
      font-family: 'Maven Pro', sans-serif;
    }
    .commentChat{
      width:100%;
      height:250px;
      margin:10px 0;
    }
    .comment{
      width:50%;
      height:250px;
      /* background:#000; */
      float:left;
    }
    .chat{
      width:50%;
      height:250px;
      /* background:#fff; */
      float:right;
    }
    .fa{
      /* color:#FF9; */
      color:#000;
    }
    .com{
      border-radius:15px;
    }
    .addComment{
      width:55px;
      padding:5px;
      float:right;
      margin:10px;
    }
    .my{
		color:#CCD700;
    }
    .shop{
      color:#0099A5;
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
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search Items" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
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

<!-- ASIDE -->

  <aside>
      <h3 style="text-align:center">Categories</h3>
      <hr>
  </aside>

<div class="main">
<?php
  if(isset($itemsDB)){
    foreach ($itemsDB as $item) {   
?>
  <div>
    <img src="/uploads/items/<?php echo $item->itemImage; ?>"width="350px"height="250px" alt="Img" class="fig">
    <div class="itemDetail">
      <h2 class="itemName"><?php echo $item->itemName; ?></h2><br>
      <span id="target" class="fa fa-star a" ></span>
      <span  class="fa fa-star a" ></span>
      <span  class="fa fa-star a" ></span>
      <span  class="fa fa-star a" ></span>
      <span  class="fa fa-star a" ></span>
      <p>RS : <?php echo $item->itemPrice; ?></p>
      <p><?php echo $item->itemDetails; ?></p>
      <p><?php echo $item->catName; ?>><?php echo $item->subcatName; ?></p>
    </div>
    <div class="clearBoth"></div>
    
  </div>
<?php
    }
  }
?>

<div class="commentChat">
  <form action="/comment" method="post">
    <div class="comment">
      <textarea rows="5" cols="60" placeholder="Comment" class="com"></textarea>
      <button type="button" class="btn btn-info addComment">Add</button>
    </div>
  </form>
  <div class="chat"></div>
  <div class="clearBoth"></div>
</div>
</div>

<div class="clearBoth"></div>

<script type="text/javascript">
  function rateInsert(itemid,rateno)
	{
		$( "#target" ).click(function() {
  alert( "Handler for .click() called. ");
});
	}
</script>

</body>
</html>