<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';
/**
 * A very simple unit tests.
 * Autoloading is activated.
 *
 * usage:
 * phpunit test/phpunit/unit/RaceTest.php
 */
class unit_RaceTest extends sfPHPUnitBaseTestCase
{
  public function testDefault()
  {
    $t = $this->getTest();

    $sprinterSlow = new Sprinter('slowman', 'slow');
    $sprinterMedium = new Sprinter('mediumman', 'medium');
    $sprinterFast = new Sprinter('fastman', 'fast');

    $race = new Race();
    $race->addContestant($sprinterSlow);
    $race->addContestant($sprinterMedium);
    $race->addContestant($sprinterFast);
    $winnerTime = $race->run(50);

    $t->diag('winner time: '.$winnerTime);

    $winner = $race->getWinner();
    $this->assertTrue(is_array($winner));
    $this->assertEquals($sprinterFast->getName(), $winner[0]->getName());
    $this->assertEquals($winnerTime, $winner[0]->getTime());
  }
}