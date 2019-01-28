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

    <script src = "/js/jquery.js"></script>
    <style>
        body{
            background:url('/uploads/additembg.jpg')no-repeat;
            background-size:100%;
            height: 140px;
            display:block;
            padding:0 !important;
            margin:0;
         }
        .additem{
            width:30%;
            position:relative;
            margin:auto;
            margin-top:100px;
        }
        input{
            width:100%;
        }
    </style>
</head>
<body>
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/shopHome">MyShop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-item nav-link active" href="/shopHome">Home <span class="sr-only">(current)</span></a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Items
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/addItem">Add Items</a>
                    <a class="dropdown-item" href="/viewItem">View Items</a>
                </li>
                </ul>
                <a class="nav-item nav-link" href="#">Chat</a>
                <a class="nav-item nav-link" href="#">View Orders</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">View Acconut</a>
                    <a class="dropdown-item" href="#">Logout</a>
                </li>
                </ul>
                </div>
            </div>
        </nav>

        <div class="additem">
            <form action="/itemToDB" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                <h3>Add Item</h3>
                <input type="text" name="itemName" id="itemName" class="form-control" placeholder="Item Name"><br>

                <select name="selCat" id="selCat" class="sel form-control" >
                    <option>---CATEGORY---</option>
                    <?php
                    if(isset($category))
                    {
                        foreach($category as $cat)
                        {
                            ?>
                                <option value="<?php echo $cat->catId; ?>"><?php echo $cat->catName; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select><br>

                <select name="selSubCat" id="selSubCat" class="sel form-control">
                    <option>---SUBCATEGORY---</option>
                </select><br>

                <input type="text" name="itemDetails" id="itemDetails" class="form-control" placeholder="Item Details"><br>

                <input type="text" name="itemPrice" id="itemPrice" class="form-control" placeholder="Item Price"><br>
                
                <input type="text" name="itemStock" id="itemStock" class="form-control" placeholder="Item Stock"><br>

                <input type="file" name="itemImage" id="itemImage">

                <input type="submit" name="btnSubmit" id="btnSubmit" value="Save" class="button btn btn-primary"/>
            </form>
        </div>
    </div>

<script type="text/javascript">

$('#selCat').change(function()
{
    var catId = $(this).val();
    if(catId)
    {
        $.ajax({
            type:"GET",
            url:"/api/get-subCategory?cat_Id="+catId,
            success:function(res)
            {
                if(res)
                {
                    $("#selSubCat").empty();
                    $("#selSubCat").append('<option>---SUBCATEGORY---</option>');
                    $.each(res,function(key,value){
                        $('#selSubCat').append('<option value="'+key+'">'+value+'</option>')
                    });
                }
                else
                {
                    $("#selSubCat").empty();
                }
            }
        });
    }
    else
    {
        $("#selDistrict").empty();
    }
});

</script>
</body>
</html>