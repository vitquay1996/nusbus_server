<?php

require_once 'DAO.php';

/**
/* Class BusDAO
*/
abstract class BusDAO extends EntityBase
{
  /**
  /*  (PK)
  /* @var int $id
   */
  public $id;

  /**
  /* 
  /* @var varchar $phone_id
   */
  public $phone_id;

  /**
  /* 
  /* @var varchar $bus
   */
  public $bus;

  /**
  /* 
  /* @var double $lat
   */
  public $lat;

  /**
  /* 
  /* @var double $long
   */
  public $longitude;

  /**
  /* 
  /* @var datetime $time
   */
  public $time;

  /**
  /* 
  /* @var int $status
   */
  public $status;


  /**
  /* Constructor
  /* @var mixed $id
   */
  public function __construct($id=0)
  {
    parent::__construct();
    $this->table='bus';
    $this->primkeys=array('id');
    $this->fields=array('id','phone_id','bus','lat','longitude','time','status');
    $this->sql="SELECT * FROM {$this->table}";
    if($id) $this->read($id);
  }

  /**
  /* Primary Key Finder
  /* @return object
   */
  public function findById($id)
  {
    $sql="SELECT * FROM bus WHERE id='$id' LIMIT 1";
    return $this->getSelfObject($sql);
  }

  /**
  /* Column phone_id Finder
  /* @return object[]
   */
  public function findByPhoneId($phone_id)
  {
    $sql="SELECT * FROM bus WHERE phone_id='$phone_id'";
    return $this->getSelfObject($sql);
  }

  // ==========!!!DO NOT PUT YOUR OWN CODE (BUSINESS LOGIC) HERE!!!==========
  // EXTEND THIS DAO CLASS WITH YOUR ONW CLASS CONTAINING YOUR BUSINESS LOGIC
  // BECAUSE THIS CLASS WILL BE !!RECREATED--OVERWRITTEN!! ON NEXT PHPDAO RUN
}

