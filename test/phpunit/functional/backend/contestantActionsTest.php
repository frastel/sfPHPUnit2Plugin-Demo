<?php
require_once dirname(__FILE__).'/../../bootstrap/functional.php';
/**
 * This small functional tests demonstrates that several applications could be handled
 * with PHPUnit. Compare this test to the one in the frontend folder.
 */
class functional_backend_contestantActionsTest extends sfPHPUnitBaseFunctionalTestCase
{
  protected function _start()
  {
    new sfDatabaseManager($this->getApplicationConfiguration());
    Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/phpunit/data/fixtures');
  }

  protected function getApplication()
  {
    return 'backend';
  }

  public function testDefault()
  {
    $browser = $this->getBrowser();

    $browser->
      get('/contestant/index')->

      with('request')->begin()->
        isParameter('module', 'contestant')->
        isParameter('action', 'index')->
      end()->

      with('response')->begin()->
        isStatusCode(200)->
        checkElement('body', '/app:backend/')->
      end()
    ;
  }
}