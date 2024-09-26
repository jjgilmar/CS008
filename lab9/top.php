<?php

$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);

?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Renewable Energy Sources</title>
        <meta name="author" content="Joey Gilmartin">
        <meta name="description" content="Information regarding renewable energy sources and how they are used in order to keep the Earth a cleaner place. ">
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