<?php

class Race
{
  private $contestants = array();
  private $times = array();

  /**
   * Adds a contestant to the race
   *
   * @param Raceable $contestant
   *
   * @throws RaceException when contestant with given name is already registered
   */
  public function addContestant(Raceable $contestant)
  {
    if(isset($this->contestants[$contestant->getName()]))
    {
      throw new RaceException('Contestant names have to be unique');
    }
    $this->contestants[$contestant->getName()] = $contestant;
  }

  public function getContestant($name)
  {
    if(!isset($this->contestants[$name]))
    {
      throw new RaceException(sprintf('Contestant with name "%s" is not registered', $name));
    }

    return $this->contestants[$name];
  }

  /**
   * Executes the race and returns the winner time
   *
   * @param int $distance
   * @return float
   */
  public function run($distance)
  {
    foreach($this->contestants as $contestant)
    {
      $time = ''.$contestant->run($distance);
      if(!isset($this->times[$time]))
      {
        $this->times[$time] = array();
      }

      $this->times[$time][] = $contestant->getName();
    }

    ksort($this->times);

    // get the index with the fastest time
    $keys = array_keys($this->times);

    // and return this time
    return $keys[0];
  }

  /**
   * Returns winner(s)
   *
   * @return array always an array, because there could be several contestants with the same time
   */
  public function getWinner()
  {
    $keys = array_keys($this->times);

    $names = $this->times[$keys[0]];

    $retval = array();

    foreach($names as $name)
    {
      $retval[] = $this->contestants[$name];
    }

    return $retval;
  }

}