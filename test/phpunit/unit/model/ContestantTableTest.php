<?php
require_once dirname(__FILE__).'/../../bootstrap/unit.php';
/**
 * This is a very simple test to demonstrate how fixtures are loaded in a unit test.
 *
 * usage:
 * phpunit test/phpunit/unit/model/ContestantTableTest.php
 */
class unit_ContestantTableTest extends sfPHPUnitBaseTestCase
{

  protected function getApplication()
  {
    return 'frontend';
  }

  protected function _start()
  {
    new sfDatabaseManager($this->getApplicationConfiguration());
    Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/phpunit/data/fixtures');
  }

  public function testDefault()
  {
    $contestantSlow = ContestantTable::getInstance()->findOneByName('slowman');
    $contestantFast = ContestantTable::getInstance()->findOneByName('fastman');

    $t = $this->getTest();

    $race = new Race();
    $race->addContestant($contestantSlow->getSprinter());
    $race->addContestant($contestantFast->getSprinter());
    $race->run(100);

    $winner = $race->getWinner();
    $this->assertEquals($contestantFast->name, $winner[0]->getName());
  }
}