<?php

if ($_REQUEST['urls'] && $_REQUEST['keywords']) {
	
	$keywords = json_decode($_REQUEST['keywords']);
	$urls = json_decode($_REQUEST['urls']);
	$results = [];
	
	foreach ($urls as $url) {
		
		$string = file_get_contents($url);
		
		$keywordResults = [];
		$urlResult = '';
		
		foreach ($keywords as $keyword) {
			if (strpos($string, $keyword)) {
				$urlResult = $url;
				$keywordResults[] = $keyword;
			}
		}
		if (!empty($urlResult) && !empty($keywordResults)) $results[] = ['url' => $urlResult, 'keywords' => $keywordResults];
	}
	echo json_encode($results);
	exit();
}

?>
