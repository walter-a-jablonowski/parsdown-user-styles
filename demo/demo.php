<?php

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

use WAJ\Lib\Spec\ParsedownUserStyles\ParsedownUserStyles;

require( 'vendor/autoload.php' );
require( 'kint.phar' );  // just a debugging tool


$md = new ParsedownUserStyles();

$md->setStyles( Yaml::parse( file_get_contents( 'styles.yml' )) );

$mdString = $md->text( file_get_contents('data/demo.md') );


?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Demo</title>

  <link rel="stylesheet" href="demo.css">

</head>
<body>

<?= $mdString ?> 

</body>
</html>
