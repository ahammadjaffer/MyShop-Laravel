<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MYSHOP</title>
</head>
<body>
    <h1>User Cart</h1>
    <?php
        if (isset($data)) 
        {
            echo $data;
            echo $itemCount;
        }
    ?>
</body>
</html>