<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DROPDOWN</title>
    <script src = "/js/jquery.js">
    </script>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <select name="selCountry" id="selCountry">
                        <option value="">---SELECT---</option>
                        <?php
                            if(isset($Countries))
                            {
                                foreach($Countries as $country)
                                {
                                    ?>
                                        <option value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="selState" id="selState">
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="selCity" id="selCity">
                        
                    </select>
                </td>
            </tr>
        </table>
    </form>

    <script type="text/javascript">
        $('#selCountry').change(function()
        {
            var countryId = $(this).val();
            //alert(countryId);
            if(countryId)
            {
                $.ajax({
                    type:"GET",
                    url:"/api/get-state-list?country_id="+countryId,
                    success:function(res)
                    {
                        if(res)
                        {
                            $("#selState").empty();
                            $("#selState").append('<option>SELECT</option>');
                            $.each(res,function(key,value){
                                $("#selState").append('<option value="'+key+'">'+value+'</option>')
                            });
                        }
                        else{
                            $("#selState").empty();
                        }
                    }
                });
            }else{
                $("#selState").empty();
                $("#selCity").empty();
            }
        });
        $('#selState').on('change',function(){
            var stateId = $(this).val();
            if(stateId){
                $.ajax({
                    type:"GET",
                    url:"/api/get-city-list?state_id="+stateId,
                    success:function(res){
                        if(res)
                        {
                            $("#selCity").empty();
                            $("#selCity").append('<option>SELECT</option>');
                            $.each(res,function(key,value){
                                $("#selCity").append('<option value="'+key+'">'+value+'</option>')
                            });
                        }
                        else{
                            $("#selCity").empty();
                        }
                    }
                });
            }else{
                $("#selCity").empty();
            }
        });
    </script>
</body>
</html>