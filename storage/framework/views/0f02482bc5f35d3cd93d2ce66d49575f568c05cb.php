<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MYSHOP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="/additem" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
            <input type="text" name="itemName" id="itemName">
            <input type="text" name="itemPrice" id="itemPrice">
            <input type="text" name="itemDetails" id="itemDetails">

            <select name="selCat" id="selCat" class="sel">
                    <option>---CATEGORY---</option>
                    <?php
                    if(isset($selStateQuery))
                    {
                        foreach($selStateQuery as $statename)
                        {
                            ?>
                                <option value="<?php echo $statename->stateId; ?>"><?php echo $statename->stateName; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>

                <select name="selSubCat" id="selSubCat" class="sel">
                    <option>---SUBCATEGORY---</option>
                </select>

                <input type="submit" name="btnSubmit" id="btnSubmit" value="Save" class="button btn btn-primary"/>
        </form>
    </div>
</body>
</html>