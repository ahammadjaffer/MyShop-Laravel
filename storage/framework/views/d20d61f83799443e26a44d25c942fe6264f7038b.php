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
        <div class="registerbox">
            <form action="/shopRegister" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                <h2 class="heading">Register</h2>
                <input type="text" name="txtshopName" id="txtshopName" placeholder="Shop Name" autofocus="autofocus"/><br>
                <input type="text" name="txtOwnername" id="txtOwnername" placeholder="Ownername"/><br>
                <input type="text" name="txtUserName" id="txtUserName" placeholder="UserName"/><br>
                <input type="text" name="txtPassword" id="txtPassword" placeholder="Password"/><br>
                <input type="text" name="txtConfirmPassword" id="txtConfirmPassword" placeholder="Confirm Password"/><br>
                <input type="text" name="txtnumber" id="txtnumber" placeholder="Number"/><br>

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

                <select name="selDistrict" id="selDistrict">
                    <option value="">---Select---</option>
                    <?php
                    foreach($selDistrictQuery as $districtname)
                    {
                        ?>
                            <option value="<?php echo $districtname->districtId; ?>"><?php echo $districtname->districtName; ?></option>
                        <?php
                    }
                        ?>
                </select>

                <select name="selPlace" id="selPlace">
                    <option value="">---Select---</option>
                    <?php
                    foreach($selPlaceQuery as $placename)
                    {
                        ?>
                            <option value="<?php echo $placename->placeId; ?>"><?php echo $placename->placeName; ?></option>
                        <?php
                    }
                        ?>
                </select>
                <input type="submit" name="btnSubmit" id="btnSubmit" value="Register" class="button btn btn-primary"/>
            </form>
        </div>
    </div>
</body>
</html>