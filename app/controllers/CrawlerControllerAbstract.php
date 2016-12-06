<?php
 
abstract class CrawlerControllerAbstract extends Controller
{
 
  protected $finder;
  protected $url;
  
  public function __construct()
  {
      $this->loadDom($this->url);
  }
  
  protected function loadDom() {
	$doc = new DOMDocument('1.0');
	@$doc->loadHTMLFile($this->url);

	$this->finder = new DomXPath($doc);
  }
 
  abstract public function crawl();
  abstract public function changePage();
}
