<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';
/**
 * A very simple demo for a unit test.
 *
 * usage:
 * phpunit test/phpunit/unit/SprinterTest.php
 */
class unit_SprinterTest extends sfPHPUnitBaseTestCase
{
  public function testDefault()
  {
    $t = $this->getTest();

    for($i=0;$i<100;$i++)
    {
      //$t->diag('testrun: #'.($i+1));

      $sprinterSlow = new Sprinter('slowman', 'slow');
      $timeSlow = $sprinterSlow->run(50);
      //$t->diag('slowman time: '.$timeSlow);

      $sprinterMedium = new Sprinter('mediumman', 'medium');
      $timeMedium = $sprinterMedium->run(50);
      //$t->diag('mediumman time: '.$timeMedium);

      $sprinterFast = new Sprinter('fastman', 'fast');
      $timeFast = $sprinterFast->run(50);
      //$t->diag('fastman time: '.$timeFast);

      // test the fastest value
      $this->assertEquals($timeFast, min($timeSlow, $timeMedium, $timeFast));

      // test the slowest value
      $this->assertEquals($timeSlow, max($timeSlow, $timeMedium, $timeFast));
      //$t->diag(' ');
    }
  }
}