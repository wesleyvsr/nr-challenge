<?php

use app\models\SebraeBidding;

class CrawlerSebraeController extends CrawlerControllerAbstract
{
  public function __construct()
  {
	$this->url = "http://www.sebrae.com.br/canaldofornecedor";
	parent::__construct();
  }
  
  /**
  *	@TODO - method to change pages of the biddings
  */
  public function changePage()
  {
	// This method can call crawler method again with new content for it.
  } 
  
  /**
  *	@TODO - extract parsing logic to model layer
  */
  
  public function crawl()
  {
	$classname="unidade";
	$nodes = $this->finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
	$biddings;
	
	foreach($nodes as $key => $node)
	{	
		$spanNodes = $node->getElementsByTagName("span");
		$h3Nodes = $node->getElementsByTagName("h3");
		
		if (!$spanNodes->length || !$h3Nodes->length)
		{
			continue;				
		}
		
		$spanNode = $spanNodes->item(0);
		$h3Node = $h3Nodes->item(0);
	
		$biddings[$key] = new SebraeBidding($spanNode->nodeValue, $h3Node->nodeValue);
	}
	
	/**
	*	@TODO - get the rest of the data and change pages if possible.
	*	$this->changePage();
	*/
	
	return View::make('sebraeCrawler', ['biddings' => $biddings]);
  }
}
 