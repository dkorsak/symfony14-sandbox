<?php
/**
 * Site helper
 *
 * @package    comgroup
 * @subpackage lib.helper
 * @author     Daniel Korsak <daniel.korsak@wp.pl>
 * @version    SVN: $Id$
 */

/**
 * Truncate post body - get first $count elements
 * 
 * @param string $text
 * @param int $count
 * @return string
 */
function truncate_post_body($text, $count)
{
    $dom = new simple_html_dom;
    $dom->load($text, true);
    $nodes = $dom->childNodes();
    $countNodes = count($dom->childNodes());
    if ($countNodes > 0) {
        $str = '';
        for($i=0;$i<=$count-1;$i++) {
            if (isset($nodes[$i])) {
                $str .= $nodes[$i]->outertext();
            }  
        }
        return $str;
    } else {
        return $text;
    }
}

function cut_post_body($text, $start)
{
    $dom = new simple_html_dom;
    $dom->load($text, true);
    $nodes = $dom->childNodes();
    $countNodes = count($dom->childNodes());
    if ($countNodes > 0 && $start <= ($countNodes-1)) {
        $str = '';
        for($i=$start;$i<=$countNodes-1;$i++) {
            if (isset($nodes[$i])) {
                $str .= $nodes[$i]->outertext();
            }  
        }
        return $str;
    } else {
        return '';
    }
}

/**
 * Mailto helper ported from smarty
 * Input:
 *         - name = text to display, default is address
 *         - address = e-mail address
 *         - encode = (optional) can be one of:
 *                * none : no encoding (default)
 *                * javascript : encode with javascript
 *                * javascript_charcode : encode with javascript charcode
 *                * hex : encode with hexidecimal (no javascript)
 *         - params is an associated arrays that can contain:
 *           - cc = (optional) address(es) to carbon copy
 *           - bcc = (optional) address(es) to blind carbon copy
 *           - subject = (optional) e-mail subject
 *           - newsgroups = (optional) newsgroup(s) to post to
 *           - followupto = (optional) address(es) to follow up to
 *           - extra = (optional) extra tags for the href link
 * 
 * @param string $address
 * @param string $encode
 * @param array $params
 * @return string
 */
function mailto_encode($name, $address, $encode = 'none', $params = array())
{
  $text = $name;
  // netscape and mozilla do not decode %40 (@) in BCC field (bug?)
  // so, don't encode it.
  $search = array('%40', '%2C');
  $replace  = array('@', ',');
  $mail_parms = array();
  foreach ($params as $var=>$value) {
      switch ($var) {
          case 'cc':
          case 'bcc':
          case 'followupto':
              if (!empty($value))
                  $mail_parms[] = $var.'='.str_replace($search,$replace,rawurlencode($value));
              break;
              
          case 'subject':
          case 'newsgroups':
              $mail_parms[] = $var.'='.rawurlencode($value);
              break;

          case 'extra':
          case 'text':
              $$var = $value;

          default:
      }
  }

  $mail_parm_vals = '';
  for ($i=0; $i<count($mail_parms); $i++) {
      $mail_parm_vals .= (0==$i) ? '?' : '&';
      $mail_parm_vals .= $mail_parms[$i];
  }
  $address .= $mail_parm_vals;

  if (!in_array($encode,array('javascript','javascript_charcode','hex','none')) ) {
      $encode = 'none';
      return;
  }

  if ($encode == 'javascript' ) {
      $string = 'document.write(\'<a href="mailto:'.$address.'" '.$extra.'>'.$text.'</a>\');';

      $js_encode = '';
      for ($x=0; $x < strlen($string); $x++) {
          $js_encode .= '%' . bin2hex($string[$x]);
      }

      return '<script type="text/javascript">eval(unescape(\''.$js_encode.'\'))</script>';

  } elseif ($encode == 'javascript_charcode' ) {
      $string = '<a href="mailto:'.$address.'" '.$extra.'>'.$text.'</a>';

      for($x = 0, $y = strlen($string); $x < $y; $x++ ) {
          $ord[] = ord($string[$x]);   
      }

      $_ret = "<script type=\"text/javascript\" language=\"javascript\">\n";
      $_ret .= "<!--\n";
      $_ret .= "{document.write(String.fromCharCode(";
      $_ret .= implode(',',$ord);
      $_ret .= "))";
      $_ret .= "}\n";
      $_ret .= "//-->\n";
      $_ret .= "</script>\n";
      
      return $_ret;
      
      
  } elseif ($encode == 'hex') {

      preg_match('!^(.*)(\?.*)$!',$address,$match);
      if(!empty($match[2])) {
        throw new Exception('mailto: hex encoding does not work with extra attributes. Try javascript.');
        return;
      }
      $address_encode = '';
      for ($x=0; $x < strlen($address); $x++) {
          if(preg_match('!\w!',$address[$x])) {
              $address_encode .= '%' . bin2hex($address[$x]);
          } else {
              $address_encode .= $address[$x];
          }
      }
      $text_encode = '';
      for ($x=0; $x < strlen($text); $x++) {
          $text_encode .= '&#x' . bin2hex($text[$x]).';';
      }

      $mailto = "&#109;&#97;&#105;&#108;&#116;&#111;&#58;";
      return '<a href="'.$mailto.$address_encode.'" '.$extra.'>'.$text_encode.'</a>';

  } else {
      // no encoding
      return '<a href="mailto:'.$address.'" '.$extra.'>'.$text.'</a>';
  }
  
}

/**
 * Generate per pages
 * 
 */
function generate_per_page()
{
    return array('5' => '5', '10' => '10', '20' => '20', '50' => '50');
}

function mail_to_encode($address, $name = '', $params = array())
{
    if ($name == '') {
        $name = $address;
    }
    return mailto_encode($name, $address, 'javascript', $params);
}
function include_metas_no_title()
{
    $context = sfContext::getInstance();
    $i18n = sfConfig::get('sf_i18n') ? $context->getI18N() : null;
    foreach ($context->getResponse()->getMetas() as $name => $content) {
        if ($name == "title") {
            continue;
        }
        echo tag('meta', array('name' => $name, 'content' => null === $i18n ? $content : $i18n->__($content)))."\n";
    }
}