<?php

/**
 * contestant actions.
 *
 * @package    sf_sandbox
 * @subpackage contestant
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contestantActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    // stupid doctrine query
    // for getting some collection instance
    $q = ContestantTable::getInstance()->createQuery('c');
    $q->orderBy('c.created_at')->limit(10);

    $this->contestants = $q->execute();
  }
}
