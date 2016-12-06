<?php

use app\models\GDFBidding;

class CrawlerGDFController extends CrawlerControllerAbstract
{
  public function __construct()
  {
	$this->url = "https://www.compras.df.gov.br/publico/em_andamento.asp";
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
	$classname = "borda-verde";
	$nodes = $this->finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
	$biddings;
	
	foreach($nodes as $node)
	{	
		$aNodes = $node->getElementsByTagName("a");

		if(!$aNodes->length)
		{
			continue;
		}

		foreach($aNodes as $key => $aNode)
		{
			if (!$aNode->nodeValue)
			{
				continue;
			}
			
			$code = $aNode->nodeValue;
			$url = "https://www.compras.df.gov.br/publico/" . $aNode->getAttribute('href');
			
			$urlDoc = new DOMDocument('1.0');
			@$urlDoc->loadHTMLFile($url);
			$finder = new DomXPath($urlDoc);
	
			$urlClassname = "tribuchet-13-verde-escuro";
			$urlNodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $urlClassname ')]");
			
			$title = $urlNodes->item(0)->nodeValue;
			$registrationPeriod = $urlNodes->item(1)->nodeValue;
			$date = $urlNodes->item(2)->nodeValue;
			
			$biddings[$key] = new GDFBidding($code, $url, $title, $registrationPeriod, $date);
		}
	}
	
	/**
	*	@TODO - change pages if possible, 
	*	in this specific site one can try to pass the $offset variable by GET (mutiple of 6).
	*	$this->changePage();
	*/
	
	return View::make('gdfCrawler', ['biddings' => $biddings]);
  }
}
 