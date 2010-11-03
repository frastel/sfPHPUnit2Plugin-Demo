<?php

/**
 * Contestant
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Contestant extends BaseContestant
{
  private $sprinter = null;

  public function getSprinter()
  {
    if(is_null($this->sprinter))
    {
      $this->sprinter = new Sprinter($this->name, $this->speed_factor);
    }

    return $this->sprinter;
  }
}