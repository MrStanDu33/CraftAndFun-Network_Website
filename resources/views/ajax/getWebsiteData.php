<?php
	$str = file_get_contents($_GET["url"]);
	if(strlen($str)>0)
	{
		$str = trim(preg_replace('/\s+/', ' ', $str));
		$doc = new DOMDocument();
		@$doc->loadHTML($str);
		$nodes = $doc->getElementsByTagName('title');
		$title = $nodes->item(0)->nodeValue;
		$metas = $doc->getElementsByTagName('meta');
		for ($i = 0; $i < $metas->length; $i++)
		{
			$meta = $metas->item($i);
			if($meta->getAttribute('name') == 'description')
			{
				$description = $meta->getAttribute('content');
			}
			if($meta->getAttribute('name') == 'keywords')
			{
				$keywords = $meta->getAttribute('content');
			}
			if($meta->getAttribute('name') == 'twitter:image')
			{
				$img = $meta->getAttribute('content');
			}
			else if($meta->getAttribute('property') == 'og:image')
			{
				$img = $meta->getAttribute('content');
			}
		}
		echo(json_encode(array("domain" => $_GET['domain'], "title" => $title, "description" => $description, "image" => $img)));
	}
?>