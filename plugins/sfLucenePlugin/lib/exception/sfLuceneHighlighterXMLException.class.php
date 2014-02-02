<?php
/*
 * This file is part of the sfLucenePlugin package
 * (c) 2007 - 2008 Carl Vondrick <carl@carlsoft.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * @package sfLucenePlugin
 * @subpackage Exception
 * @author Carl Vondrick <carl@carlsoft.net>
 * @version SVN: $Id: sfLuceneHighlighterXMLException.class.php 7108 2008-01-20 07:44:42Z Carl.Vondrick $
 */
class sfLuceneHighlighterXMLException extends sfLuceneHighlighterException
{
  protected $libxmlError = null;

  public function __construct($message, $libxmlError, $code = 0)
  {
    $this->libxmlError = $libxmlError;

    parent::__construct($message, $code);
  }

  public function getProblems()
  {
    $problems = array();

    foreach ($this->libxmlError as $error)
    {
      $problems[] = trim($error->message, "\r\n") . ', line ' . $error->line . ', col ' . $error->column;
    }

    return $problems;
  }
}