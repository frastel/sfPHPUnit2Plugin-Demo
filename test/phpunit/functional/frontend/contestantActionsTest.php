<?php
require_once dirname(__FILE__).'/../../bootstrap/functional.php';
/**
 * A very simple test case for demonstrating functional testing.
 *
 * usage:
 * phpunit test/phpunit/functional/frontend/contestantActionsTest.php
 */
class functional_frontend_contestantActionsTest extends sfPHPUnitBaseFunctionalTestCase
{
  protected function _start()
  {
    new sfDatabaseManager($this->getApplicationConfiguration());
    Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/phpunit/data/fixtures');
  }

  protected function getApplication()
  {
    return 'frontend';
  }

  public function testDefault()
  {
    $browser = $this->getBrowser();

    $browser->
      get('/contestants')->

      with('request')->begin()->
        isParameter('module', 'contestant')->
        isParameter('action', 'index')->
      end()->

      with('response')->begin()->
        isStatusCode(200)->
        checkElement('body', '/Contestants/')->
      end()
    ;
  }
}