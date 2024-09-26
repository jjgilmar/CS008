<?php

$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);

?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Kid Cudi</title>
        <meta name="author" content="Joey Gilmartin">
        <meta name="description" content="Kid Cudi is a talented rapper, songwriter, and producer. This website contains information about him, his music career and his impact on music.">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <link rel="stylesheet"
        href="css/custom.css?version=<?php print time(); ?>" 
        type="text/css">
        <link rel="stylesheet" 
        media="(max-width: 800px)"
        href="css/custom-tablet.css?version=<?php print time(); ?>" 
        type="text/css">
        <link rel="stylesheet" 
        media="(max-width: 600px)"
        href="css/custom-phone.css?version=<?php print time(); ?>"
        type="text/css">
        <link rel="icon" type="image/x-icon" href="images/cudi-favicon.png">

    </head>

<?php

print'<body class="' . $pathParts['filename'] . '">';

print '<!-- ################ Start of Body Element ############################ -->';

include 'connect-DB.php';
print PHP_EOL;
include 'header.php';
print PHP_EOL;
include 'nav.php';
print PHP_EOL;

?>