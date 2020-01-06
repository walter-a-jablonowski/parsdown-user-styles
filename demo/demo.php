<?php

// use Symfony\Component\Yaml\Yaml;
// use Symfony\Component\Yaml\Exception\ParseException;

use WAJ\Lib\Web\ParsedownUserStyles;

$md = new ParsedownUserStyles();

$md->addUserStyle( 'Unique - name', [
  [               // replacements
    find => '[[',
    replace => '<span class="header">'
  ],
  [
    find => ']]',
    replace => '</span>'
  ]
]);

/*
$md->setUserStyles( [
  
  'Unique - name' => [
    [
      find => '[[',
      replace => '<span class="header">'
    ],
    [
      find => ']]',
      replace => '</span>'
    ]
  ]

]);
*/

// $md->setUserStyles( Yaml::parse( file_get_contents( ... )) );  // setUserStyles() takes a single array

$mdString = $md->text( '[[ My headline ]]' );

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
