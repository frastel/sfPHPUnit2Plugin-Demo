<?php

class Sprinter implements Raceable
{
  private $name;
  private $distance;
  private $speed;
  private $speedFactor;
  private $total;
  private static $factor = array('slow' => 3, 'medium' => 2, 'fast' => 1);

  public function __construct($name, $speedFactor)
  {
    $this->name = $name;
    $this->speedFactor = $speedFactor;
  }

  public function getName()
  {
    return $this->name;
  }

  /**
   * 3,2,1 ... GO
   *
   * @param int $distance the distance in meters
   * @param string $speedFactor possible values: slow, medium, fast
   *
   * @return float time
   */
  public function run($distance)
  {
    // 12,1 m/s world record
    if(!isset(self::$factor[$this->speedFactor]))
    {
      throw new RaceRuntimeException('No well defined speed factor given');
    }

    // +/- 0.1
    $salt = rand(9,11)/10;

    // calculate speed
    $this->speed = 12.1/(self::$factor[$this->speedFactor] * $salt);
    $this->time = round($distance/$this->speed, 2);

    return $this->time;
  }

  /**
   * Returns speed of current run
   *
   * @return float
   */
  public function getSpeed()
  {
    return $this->speed;
  }

  public function getTime()
  {
    return $this->time;
  }
}