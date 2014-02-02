<?php
/**
 * Utils class. Some methods
 *
 * @package    comgroup
 * @subpackage lib
 * @author     Daniel Korsak <daniel.korsak@wp.pl>
 * @version    SVN: $Id$
 */
class Utils {
	
  /**
   * This function create stripped title from string parameter.
   * Replace all Polish characters
   * 
   * @param string $title - text to translate
   * @param string $type - end of title
   * @return string
   */
  public static function createStrippedTitle($title, $type='')
  {
    // replace Polish letters
    $title = strtolower($title);
    $polish = array(',', ' - ',' ','ę', 'Ę', 'ó', 'Ó', 'Ą', 'ą', 'Ś', 'ł', 'Ł', 'ż', 'Ż', 'Ź', 'ź', 'ć', 'Ć', 'ń', 'Ń','-',"'","/","?", '"', ":", 'ś', '!','.', '&', '&amp;', '#', ';', '[',']','domena.pl', '(', ')', '`', '%', '”', '„', '…');
    $safe = array('-',   '-',  '-','e', 'e', 'o', 'o', 'a', 'a', 's', 'l', 'l', 'z', 'z', 'z', 'z', 'c', 'c', 'n', 'n','-',"","","","","",'s','','', '', '', '', '', '', '', '', '', '', '', '', '');
    $title = str_replace($polish, $safe, $title);
    // strip all non word chars
    $title = preg_replace('/\W/', ' ', $title);
    // replace all white space sections with a dash
    $title = preg_replace('/\ +/', '-', $title);
    $title = trim($title, '-');
    // trim dashes
    $title = preg_replace('/\-$/', '', $title);
    $title = preg_replace('/^\-/', '', $title);
    return $title.$type;	
  }
  
  /**
   * This function create string constains spaces 
   * 
   * @param int $count
   * @return string
   */
  public static function spaces($count)
  {
    $temp = '';
    for($i = 0; $i < $count; $i++) 
    {
      $temp .= '&nbsp;';
    }
    return $temp;
  }
  
  /**
   * Scale image - usw wide image plugin
   *
   * @param int $ix
   * @param int $iy
   * @param string $inputPath
   * @param string $outputPath
   * @return null
   */
  public static function resizeImage($ix, $iy, $inputPath, $outputPath)
  {
    if (!file_exists($inputPath))
    {
      return false;
    }
    // get oryginal image size
    $size = getimagesize($inputPath);
    $w = $size[0];
    $h = $size[1];
    if ($ix > $w || $iy > $h)
    {
      return false;
    }
    // get centre of image
    $wS = (int)($w/2);
    $hS = (int)($h/2);
    $ratioX = $w/$ix;
    if ($ratioX == 0)
    {
      $ratioX = 1;
    }
    $ratioY = $h/$iy;
    if ($ratioY == 0)
    {
      $ratioY = 1;
    }
    if ($w > $h)
    {
      if ($ratioX >= $ratioY)
      {
        $scaleX = $ratioY*$iy;
        $scaleY = $ratioY*$ix;
      }
      else
      {
        $scaleX = $ratioX*$iy;
        $scaleY = $ratioX*$ix;
      }
      
      $top = (int)($hS - $scaleX/2);
      $left = (int)($wS - $scaleY/2);
      $width = (int)$scaleY;
      $height = (int)$scaleX;
        
    }
    else
    {
      if ($ratioX > $ratioY)
      {
        $scaleX = $ratioY*$iy;
        $scaleY = $ratioY*$ix;
      }
      else
      {
        $scaleX = $ratioX*$iy;
        $scaleY = $ratioX*$ix;
      }
      $top = (int)($hS - $scaleX/2);
      $left = (int)($wS - $scaleY/2);;
      $width = (int)$scaleY;
      $height = (int)$scaleX;
    }
    $img = WideImage::load($inputPath);
    $img->crop($left, $top, $width, $height)->resize($ix, $iy)->saveToFile($outputPath);
  }
  
  
  /**
   * Converts given array to CSV format
   *
   * @param array $toCsvArray array with values that should be inserted into CSV
   * @param string $delimiter delimiter
   * @param string $newline new line character
   */
  public static function prepareCsvLineFromArray($toCsvArray, $delimiter = ',', $newline = "\r\n")
  {
    $line = '';

    foreach ($toCsvArray as $value)
    {
      if (strpos($value, '"'))
      {
        $value = str_replace('"', '""', $value);
      }

      if (strpos($value, $delimiter))
      {
        $value = '"'. $value .'"';
      }

      $line .= trim($value) . $delimiter;
    }

    return rtrim($line, ' '.$delimiter) . $newline;
  }
  
  /**
   * Clean a file name and return a friendly one
   * Originally taken from: http://drupal.org/node/63924
   * 
   * @param string $name file name
   * @return string cleaned name
   */
  public static function cleanFile($name)
  {
    $name = preg_replace('~[^\\pL0-9_]+~u', '_', $name); // substitutes anything but letters, numbers and '_' with separator
    $name = trim($name, "-");
    $name = trim($name, "_");
    $name = strtolower($name);
    $name = preg_replace('~[^-a-z0-9_]+~', '', $name); // keep only letters, numbers, '_' and separator
    return $name;
  }
  
  public static function cuttedBody($text, $words = 100, $searchDot = true)
  {
    $stripped  = strip_tags($text);
    $res = '';
    $count = 1;
    if (strlen($stripped) > 0) {
      for ($i = 0; $i <= strlen($stripped)-1; $i++) {
          if ($stripped[$i] == ' ' || $stripped[$i] == '&nbsp;') {
            $count++;
          }
          if ($count == $words+1) {
            break;
          }
          
          $res = $res.$stripped[$i];
      }
      if ($searchDot && $res[strlen($res)-1] == '.') {
          return $res;
      }
      $res = $res.' ';
      if ($count == $words+1 && $searchDot) {
          // search dot
          for ($j = $i+1; $j <= strlen($stripped)-1; $j++) {
              $res = $res.$stripped[$j];
              if ($stripped[$j] == '.') {
                break;
              }
          }
      }
    }
    return $res;
  }
  
  public static function replacePolishCharacters($text)
  {
    $chars = array(
    "\xb9" => "a", "\xa5" => "A", "\xe6" => "c", "\xc6" => "C",
    "\xea" => "e", "\xca" => "E", "\xb3" => "l", "\xa3" => "L",
    "\xf3" => "o", "\xd3" => "O", "\x9c" => "s", "\x8c" => "S",
    "\x9f" => "z", "\xaf" => "Z", "\xbf" => "z", "\xac" => "Z",
    "\xf1" => "n", "\xd1" => "N",
 
    "\xc4\x85" => "a", "\xc4\x84" => "A", "\xc4\x87" => "c", "\xc4\x86" => "C",
    "\xc4\x99" => "e", "\xc4\x98" => "E", "\xc5\x82" => "l", "\xc5\x81" => "L",
    "\xc3\xb3" => "o", "\xc3\x93" => "O", "\xc5\x9b" => "s", "\xc5\x9a" => "S",
    "\xc5\xbc" => "z", "\xc5\xbb" => "Z", "\xc5\xba" => "z", "\xc5\xb9" => "Z",
    "\xc5\x84" => "n", "\xc5\x83" => "N",
 
    "\xb1" => "a", "\xa1" => "A", "\xe6" => "c", "\xc6" => "C",
    "\xea" => "e", "\xca" => "E", "\xb3" => "l", "\xa3" => "L",
    "\xf3" => "o", "\xd3" => "O", "\xb6" => "s", "\xa6" => "S",
    "\xbc" => "z", "\xac" => "Z", "\xbf" => "z", "\xaf" => "Z",
    "\xf1" => "n", "\xd1" => "N",
    );
    return strtr($text, $chars);
  }
  
  public static function xml2array($xml) 
  {
    $xmlary = array();
           
    $reels = '/<(\w+)\s*([^\/>]*)\s*(?:\/>|>(.*)<\/\s*\\1\s*>)/s';
    $reattrs = '/(\w+)=(?:"|\')([^"\']*)(:?"|\')/';

    preg_match_all($reels, $xml, $elements);

    foreach ($elements[1] as $ie => $xx) {
            $xmlary[$ie]["name"] = $elements[1][$ie];
           
            if ($attributes = trim($elements[2][$ie])) {
                    preg_match_all($reattrs, $attributes, $att);
                    foreach ($att[1] as $ia => $xx)
                            $xmlary[$ie]["attributes"][$att[1][$ia]] = $att[2][$ia];
            }

            $cdend = strpos($elements[3][$ie], "<");
            if ($cdend > 0) {
                    $xmlary[$ie]["text"] = substr($elements[3][$ie], 0, $cdend - 1);
            }

            if (preg_match($reels, $elements[3][$ie]))
                    $xmlary[$ie]["elements"] = self::xml2array($elements[3][$ie]);
            else if ($elements[3][$ie]) {
                    $xmlary[$ie]["text"] = $elements[3][$ie];
            }
    }

    return $xmlary;
  }
}

?>
