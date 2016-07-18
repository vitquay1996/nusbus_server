<?php

require_once 'DAO/Bus.dao.php';

/**
/* Class Bus
 */
class Bus extends BusDAO
{
  // PUT YOUR BUSINESS LOGIC HERE
	public function findAll()
  {
    $sql="SELECT * FROM bus WHERE status=1";
    return $this->getSelfObjects($sql);
  }

  	public function filterAll()
  {
    $sql="SELECT * FROM bus WHERE time < (NOW() + INTERVAL 14 HOUR - INTERVAL 1 MINUTE)";
    return $this->getSelfObjects($sql);
  }
}


