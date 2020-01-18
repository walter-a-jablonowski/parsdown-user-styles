# Parsedown User Styles

**User defined syntax for ParsedownExtra**

Define whatever syntax you want...

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)


### Usage

```
composer require walter-a-jablonowski/parsedown-user-styles
```

Include your stylesheets if you have class names in replace html.


#### YAML version

You may use [Symfony yaml](https://symfony.com/doc/current/components/yaml) as well

```php
$md->setStyles( Yaml::parse( file_get_contents( ... )) );
```

```yaml
Unique - name:

  -
    find:    "[["
    replace: "<span class="header">"
  -
    find:    "]]"
    replace: "</span>"

# ... regex version see /demo/demo.yml (you might need more escape chars in yml)
```


#### Pure code style (full sample)

Define whatever syntax you want, these are just for demo

```php

$md = new ParsedownUserStyles();

// use parsedown's methods as needed

$md->addStyle( 'Unique - name', [               // Each style can have a name and multiple replacements
  [                                             // Simple str replace
    'find'    => '[[',
    'replace' => '<span class="header">'
  ],
  [
    'find'    => ']]',
    'replace' => '</span>'
  ]
]);

$md->addStyle( 'Unique - name 2', [             // Uses preg_replace()
  [
    'regFind' => '\{Img:\s*(.*)\}',
    'replace' => '<img src="$1" style="max-width: 100%;" />'
  ]
]);

$md->addStyle( 'Unique - name 5', [             // Uses function, $found is result of
  [                                             // preg_match_all() with SET ORDER (no OFFSET CAPTURE)
    'regFind' => '\{Url:\s*([^\s]*)\s*(.*)\}',
    'do' => 'function( $text, $found ) {

      // do something with $found
      // replace in $text

      foreach( $found as $f )
      {
        $fullStr = $f[0];
        $label   = $f[1];
        $url     = $f[2];

        $s = str_replace( "[URL]",   "http://" . $url, "<a href=\"[URL]\">[LABEL]</a>" );
        $s = str_replace( "[LABEL]", $label, $s );

        $text = str_replace( $fullStr, $s, $text );
      }
      
      return $text;
    }'
  ]
]);

$mdString = $md->text( '[[ My headline ]]' );  // => <span class="header"> My headline </span>
```


> If you like visit my personal homepage: [walter-a-jablonowski.github.io](https://walter-a-jablonowski.github.io)


### LICENSE

Copyright (C) Walter A. Jablonowski 2020, MIT [License](LICENSE)

This library is build upon PHP (license see [credits](credits.md)) and has no further dependencies.\
Licenses of third party software used in samples see [credits](credits.md).


[Privacy](https://walter-a-jablonowski.github.io/privacy.html) | [Legal](https://walter-a-jablonowski.github.io/imprint.html)
