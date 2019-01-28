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
    <style>
        .delete{
            color:red;
        }
    </style>
</head>
<body>
<div class="container">

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

        <form method="post" action="/AddDistrict">
        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <table>
                <tr>
                    <td><input type="text" name="txtDistrict" id="txtDistrict" placeholder="District Name" value="<?php if(isset($editdist))echo $editdist; ?>"></td>
                    <td><input type="hidden" name="txtdhid" value="<?php if(isset($editId))echo $editId; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <select name="selState" id="selState">
                            <option value="">---Select---</option>
                            <?php
                            foreach($selStateQuery as $statename)
                            {
                                ?>
                                    <option value="<?php echo $statename->stateId; ?>"><?php echo $statename->stateName; ?></option>
                                <?php
                            }
                                ?>
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td><button type="submit" class="btn btn-outline-primary" value="Save">Save</button></td>
                </tr>
            </table>
        </form>


        
    
        <div class="card header">
            <div class="card-body">
                <h2>Districts</h2>
            </div>
        </div>
        <table width="30%">
        <?php
            if(isset($districtNames))
            {
                foreach($districtNames as $dname)
                {
                    ?>
                    <tr>
                    <td><?php echo $dname->districtName;?></td>
                    <td><?php echo $dname->stateName;?></td>
                    <td><a class="delete" href="deleteDistrict/<?php echo $dname->districtId ?>">Delete</a></td>
                    <td><a class="edit" href="district/?deid=<?php echo $dname->districtId ?>&distname=<?php  echo $dname->districtName; ?>">Edit</a></td>
                    </tr>
                    <?php
                }
            }
        ?>
        </table>
        
       
    </div>
</body>
</html>