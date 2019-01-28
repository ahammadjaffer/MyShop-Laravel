<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MYSHOP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src = "/js/jquery.js"></script>
    <style>
        .registerbox{
            width:30%;
            position:relative;
            margin:auto;
            margin-top:150px;
        }
        input{
            width:100%;
        }
        input:hover{
            border-color:#7166FE;
        }
        .heading{
            text-align:center;
            margin:25px;
        }
        .sel{
            border-radius:5px;
        }
        .sel:hover{
            border-color:#7166FE;
        }
        </style>
</head>
<body>
    <div class="container">
        <div class="registerbox">
            <form action="/registerUser" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                <h2 class="heading">Register</h2>
                <input type="text" class="form-control" name="txtFullName" id="txtFullName" placeholder="Full Name" autofocus="autofocus"/><br>
                <input type="text" class="form-control" name="txtUserName" id="txtUserName" placeholder="UserName"/><br>
                <input type="text" class="form-control" name="txtPassword" id="txtPassword" placeholder="Password"/><br>
                <input type="text" class="form-control" name="txtConfirmPassword" id="txtConfirmPassword" placeholder="Confirm Password"/><br>
                <input type="text" class="form-control" name="txtnumber" id="txtnumber" placeholder="Number"/><br>

                <select name="selState" id="selState" class="sel">
                    <option>---SELECT---</option>
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

                <br>

                <select name="selDistrict" id="selDistrict" class="sel">
                    <option>---SELECT---</option>
                </select>

                <br>

                <select name="selPlace" id="selPlace" class="sel">
                    <option>---SELECT---</option>
                </select>

                <br>

                <p>Image : </p><input type="file" name="UserImage" id="UserImage">

                <input type="submit" name="btnSubmit" id="btnSubmit" value="Register" class="button btn btn-primary"/>
                <a href="/userLogin">Login</a>
            </form>
        </div>
    </div>

   <script type="text/javascript">

        $('#selState').change(function()
        {
            var stId = $(this).val();
            if(stId)
            {
                $.ajax({
                    type:"GET",
                    url:"/user/get-districts?state_Id="+stId,
                    success:function(res)
                    {
                        if(res)
                        {
                            $("#selDistrict").empty();
                            $("#selDistrict").append('<option>---SELECT---</option>');
                            $.each(res,function(key,value){
                                $('#selDistrict').append('<option value="'+key+'">'+value+'</option>')
                            });
                        }
                        else
                        {
                            $("#selDistrict").empty();
                        }
                    }
                });
            }
            else
            {
                $("#selDistrict").empty();
                $("#selPlace").empty();
            }
        });

        $('#selDistrict').on('change', function()
        {
            var districtId = $(this).val();
            if(districtId)
            {
                $.ajax({
                    type:"GET",
                    url:"/user/get-places?district_Id="+districtId,
                    success:function(res)
                    {
                        if(res)
                        {
                            $('#selPlace').empty();
                            $('#selPlace').append('<option>---SELECT---</option>');
                            $.each(res, function(key,value){
                                $('#selPlace').append('<option value="'+key+'">'+value+'</option>')
                            });
                        }
                        else
                        {
                            $("#selPlace").empty();
                        }
                    }
                });
            }
            else
            {
                $("#selPlace").empty();
            }
        });

    </script>

</body>
</html>