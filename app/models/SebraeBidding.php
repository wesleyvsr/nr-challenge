<?php

namespace app\models;

class SebraeBidding {
	
	private $name;
	private $origin;
	
	public function __construct($name, $origin)
	{
		$this->name = $name;
		$this->origin = $origin;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getOrigin()
	{
		return $this->origin;
	}
}
