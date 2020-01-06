# Parsedown User Styles

**User defined syntax for ParsedownExtra**

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

** This is just initial commit, still debugging **

### Usage

```
composer require walter-a-jablonowski/parsedown-user-styles
```

Include your stylesheets if you have class names in replace html.

```php
$md = new ParsedownUserStyles();

// use parsedown's methods as needed

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

$mdString = $md->text( '[[ My headline ]]' );  // => <span class="header"> My headline </span>
```

You may use [Symfony yaml]() as well

```php
$md->setUserStyles( Yaml::parse( file_get_contents( ... )) );  // setUserStyles() takes a single array
```

```yaml
Unique - name:

  -
    find:    [[
    replace: <span class="header">
  -
    find:    ]]
    replace: </span>
```


> If you like visit my personal homepage: [walter-a-jablonowski.github.io](https://walter-a-jablonowski.github.io)


### LICENSE

Copyright (C) Walter A. Jablonowski 2020, MIT [License](LICENSE)

This library is build upon PHP (license see [credits](credits.md)) and has no further dependencies.\
Licenses of third party software used in samples see [credits](credits.md).


[Privacy](https://walter-a-jablonowski.github.io/privacy.html) | [Legal](https://walter-a-jablonowski.github.io/imprint.html)
