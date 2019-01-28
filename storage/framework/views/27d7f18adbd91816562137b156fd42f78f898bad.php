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
</head>
<body>
<div clas="container">
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

<!--SUBCATEGORY-->
<div class="card">
    <div class="card-body">
        <form action="/Addsubcat" method="post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
            <h2>SubCategory</h2><br>
            <input type="text" class="form-control" name="txtSubCategory" id="txtSubCategory" value="<?php if(isset($scname))echo $scname ?>"><br>
            <input type="hidden" name="txtscathid" value="<?php if(isset($scid))echo $scid; ?>"><br>
            <select name="selcat" id="selcat">
                <option value="">---SELECT---</option>
                <?php
                    foreach($cat as $category)
                    {
                        ?>
                            <option value="<?php echo $category->catId; ?>"><?php echo $category->catName; ?></option>
                        <?php
                    }
                ?>
            </select><br>
            <input type="submit" class="btn btn-primary" value="Save">
        </form>
    </div>
    </div>
    <div class="card">
        <div class="card-body">
        <table width="45%" class="table table-striped">
        <tr>
            <th>SubCategory</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <?php
            if(isset($subcategory)){
                foreach($subcategory as $subcat)
                {
                    ?>
                        <tr>
                            <td><?php echo $subcat->subcatName; ?></td>
                            <td><?php echo $subcat->catName; ?></td>
                            <td><a href="subcategory/?catid=<?php echo $subcat->subcatId ?>&catname=<?php echo $subcat->subcatName; ?>">Edit</a></td>
                            <td><a href="subdelete/<?php echo $subcat->subcatId ?>">Delete</a></td>
                        </tr>
                    <?php
                }
            }
            ?>
        </tr>
    </table>
        </div>
    </div>
</div>
</body>
</html>