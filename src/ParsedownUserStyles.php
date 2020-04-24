<?php

namespace WAJ\Lib\Spec\ParsedownUserStyles;

// use Parsedown;
// use ParsedownExtra;


class ParsedownUserStyles extends \ParsedownExtra
{
  
  protected $styles   = [];
  protected $userdata = [];


  public function __construct($userdata = [])
  {
    parent::__construct();
    
    $this->userdata = $userdata;
  }


  public function addStyle( $name, $replacements )
  {
    $this->styles[$name] = $replacements;
  }


  public function setStyles( $styles )
  {
    $this->styles = $styles;
  }


  public function text( $text )
  {
    if( isset($this->styles) )
    {
      foreach( $this->styles as $name => $style )

        foreach( $style as $replacement )

          if( isset($replacement['find'] ) && isset($replacement['replace'] ))
          {
            $text = str_replace( $replacement['find'], $replacement['replace'], $text );
          }
          elseif( isset($replacement['regFind'] ) && isset($replacement['replace'] ))
          {
            $text = preg_replace( "/$replacement[regFind]/", $replacement['replace'], $text );
          }
          elseif( isset($replacement['regFind'] ) && isset($replacement['do'] ))
          {
            $found = [];

            preg_match_all( "/$replacement[regFind]/", $text, $found, PREG_SET_ORDER );

            eval("\$func = $replacement[do];");
            $text = $func($text, $found, $this->userdata);

            // $func = $replacement['do'];
            // $text = ($func)($text, $found, $this->userdata);
          }
          else
          {
            throw new \Exception('ParsedownUserStyles: Illegal combination of keys');
          }
    }
 
    return parent::text($text);
  }


  public function textPHP( $text, $args = [] )
  {
    $text = $this->runPHP( $text, $args);
    return $this->text( $text );
  }


  // Helper

  protected function runPHP( $view, $args = [])  /*@*/
  {
    extract($args);

    ob_start();  // Alternative: $s = require()
    require($view);
    $RUN_PHP_STR = ob_get_clean();  // var has unusual name

    return $RUN_PHP_STR;
  }

}

?>