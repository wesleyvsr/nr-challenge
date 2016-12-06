<?php

namespace app\models;

class GDFBidding {
	
	private $code;
	private $url;
	private $title;
	private $registrationPeriod;
	private $date;
	
	public function __construct($code, $url, $title, $registrationPeriod, $date)
	{
		$this->code = $code;
		$this->url = $url;
		$this->title = $title;
		$this->registrationPeriod = $registrationPeriod;
		$this->date = $date;		
	}
	
	public function getCode()
	{
		return $this->code;
	}
	
	public function getUrl()
	{
		return $this->url;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getRegistrationPeriod()
	{
		return $this->registrationPeriod;
	}
	
	public function getDate()
	{
		return $this->date;
	}
}
