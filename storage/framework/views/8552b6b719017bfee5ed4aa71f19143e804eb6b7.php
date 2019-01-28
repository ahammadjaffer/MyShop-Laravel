<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src = "/js/jquery.js"></script>
    <style>
      body
      {
        background:#FFFAFA;
      }
      .navbar
      {
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
      }
      a{
        text-decoration:none;
      }
      .approve{
        color:lightgreen;
      }
      .reject{
        color:red;
      }
      
    </style>
</head>


<body id="bd">

<!--MENU-->
<div class="container">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/adminHome">MyShop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">a</span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/states">States</a>
          <a class="dropdown-item" href="/districts">Districts</a>
          <a class="dropdown-item" href="/places">Places</a>
          <a class="dropdown-item" href="/category">Category</a>
          <a class="dropdown-item" href="/subcategory">SubCategory</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/viewShops">Shops</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/viewUsers">Users</a>
      </li>
    </ul>
  </div>
</nav>

    <h2>Shops</h2>

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Shop Name</th>
      <th scope="col">Owner Name</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Accept</th>
      <th scope="col">Reject</th>
    </tr>
  </thead>
  <tbody>

      <?php 
        if(isset($shopList))
        {
          foreach($shopList as $shops)
          {
            ?>
              <tr>
                <td><?php echo $shops->shopName; ?></td>
                <td><?php echo $shops->shopOwner; ?></td>
                <td><?php echo $shops->shopContact; ?></td>
                <td><i class="material-icons approve"><a href="/approveShop?shopid=<?php echo $shops->shopId; ?>" class="approve">check</a></i></td>
                <td><i class="material-icons reject"><a href="/rejectShop?shopid=<?php echo $shops->shopId; ?>" class="reject">close</a></i></td>
              </tr>
            <?php
          }
        }
      ?>
  </tbody>
</table>



<h3>Approved Shops</h3>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Shop Name</th>
      <th scope="col">Owner Name</th>
      <th scope="col">Contact Number</th>
    </tr>
  </thead>
  <tbody>
  <?php 
        if(isset($apprShopList))
        {
          foreach($apprShopList as $appShops)
          {
            ?>
              <tr>
                <td><?php echo $appShops->shopName; ?></td>
                <td><?php echo $appShops->shopOwner; ?></td>
                <td><?php echo $appShops->shopContact; ?></td>
               </tr>
            <?php
          }
        }
      ?>
  </tbody>
</table>

<h3>Rejected Shops</h3>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Shop Name</th>
      <th scope="col">Owner Name</th>
      <th scope="col">Contact Number</th>
    </tr>
  </thead>
  <tbody>
  <?php 
        if(isset($rejcShopList))
        {
          foreach($rejcShopList as $rejShops)
          {
            ?>
              <tr>
                <td><?php echo $rejShops->shopName; ?></td>
                <td><?php echo $rejShops->shopOwner; ?></td>
                <td><?php echo $rejShops->shopContact; ?></td>
               </tr>
            <?php
          }
        }
      ?>
  </tbody>
</table>

</div>



</body>
</html>