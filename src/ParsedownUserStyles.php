namespace WAJ\Lib\Spec\ParsedownUserStyles;

// use Parsedown;
// use ParsedownExtra;


class ParsedownUserStyles extends \ParsedownExtra
{
  
  protected styles = [];


  function __construct()
  {
    parent::__construct();
  }


  protected function addStyle( $name, $replacements )
  {
    $this->styles[$name] = $replacements;
  }


  protected function setStyles( $styles )
  {
    $this->styles = $styles;
  }


  protected function text( $text )
  {
    if( isset($this->styles) )
    {
      foreach( $this->styles as $name => $style )
        foreach( $style as $replacements )
        $text = str_replace( $replacements['find'], $replacements['replace'], $text );  // TASK: prg
    }
 
    return parent::text($text);
  }
}
