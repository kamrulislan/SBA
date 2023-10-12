<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
    <title>(Type a title for your page here)</title>
</head>

<body>
    <?Php
    error_reporting(0); // With this no error reporting will be there
    $exp_cat = $_POST['category'];
    $exp_subcat = $_POST['sub-category'];
    $t1 = $_POST['t1'];

    echo "Category : $exp_cat <br> 
Sub-category = $exp_subcat <br>
Text field = $t1";

    ?>
</body>

</html>