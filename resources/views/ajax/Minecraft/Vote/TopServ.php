<?php
	$check = file_get_contents(
		'https://top-serv.org/check/vote',false,
		stream_context_create(array('http' => array(
			'method' => 'POST',
			'header' => 'Content-type: application/x-www-form-urlencoded',
			'content' => http_build_query(array(
				'id' => '563',
				'uidkey' => 'OcMOHsksolUgI7lgmAYxgUEOAu3OXEVb7QbkSi2gHfXA57eelU',
				'ip' => $ip
	))))));
	if($check == -1)
	{
		// Les données envoyées contiennent des erreurs.
	}
	elseif($check == 0)
	{
		// IP n'a pas voté, ou IP a voté il y a plus de 5 minutes, ou IP a déjà validé son vote 
	}
	elseif($check == 1)
	{
		// IP a voté il y a moins de 5 minutes. 
	}
?>