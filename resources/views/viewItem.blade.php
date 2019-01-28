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

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

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
        .itemView{
            margin-top:100px;
        }
        .tbl{
            width:100%;
            font-family: 'Montserrat', sans-serif;
            text-align:center;
        }
        .tblNo{
            width:10%;
        }
        .tblContent{
            width:18%;
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



        <div class="itemView">
            <?php
                if(isset($DBitems))
                {
                    $count=1;
                    foreach ($DBitems as $item) 
                    {
                        ?>
                            <div class="card">
                                <div class="card-body" style="padding:5px 15px;">
                                    <table class="tbl">
                                        <tr>
                                            <th class="tblNo"><?php echo $count; ?></th>
                                            <td class="tblContent"><img src="/uploads/items/<?php echo $item->itemImage; ?>" width="55px" height="55px" alt="<?php echo $item->itemImage; ?>"></td>
                                            <td class="tblContent"><?php echo $item->itemName; ?></td>
                                            <td class="tblContent"><?php echo $item->itemPrice; ?></td>
                                            <td class="tblContent"><?php echo $item->itemStock; ?></td>
                                            <td class="tblContent"><?php echo $item->itemDetails; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        <?php
                        $count++;
                    }
                }
            ?>
        </div>
        
        
        
        

    </div>

<script type="text/javascript">

</script>
</body>
</html>