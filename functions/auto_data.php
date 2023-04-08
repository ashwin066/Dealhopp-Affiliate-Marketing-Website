<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include '../includes/simple_html_dom.php';
$html = file_get_html('https://indiadesire.com/Redirect?redirectpid1=SNSF4Z6VECNHG4CV&store=flipkart');

foreach($html->find('a.myButton') as $element)
    // echo $element->src . '<br>';
    // echo '<img src="'.$element->src.'" alt="">';
   
// foreach($html->find('a') as $element)
     echo html_entity_decode($element->href) . '<br>';


?>

</body>
</html>

