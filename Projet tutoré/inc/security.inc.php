<?php
function secure( $url )
{
	define('START',   1);
	define('END',     2);
	define('CONTAIN', 4);
	define('MATCH',   8);
	
	/*
	 * On définit un tableau EXPRESSION INTERDITE => TRAITEMENT SOUHAITE
	 */
	$filters = Array(
		'http://'  => START,
		'https://' => START,
		'ftp://'   => START,
		'ftps://'  => START,
		'file://'  => START,
		'/'        => START,
		'..'       => CONTAIN,
        'php://'   => CONTAIN,
        'phar://'  => CONTAIN,
        'glob://'  => CONTAIN,
        'file://'  => CONTAIN,
        'zlib://'  => CONTAIN,
        'expect://'  => CONTAIN,
        'data://' => CONTAIN
	);
    
    /*
	 * On teste si des expression interdites sont entrées dans le paramètre $url (qui correspondra à l'url de notre article)
	 *
	 * On retourne false le cas échéant, ceci permet d'éviter le path traversal, l'inclusion de code, les attaques LFI, peut-être aussi les attaques XSS.
	 */
	foreach($filters AS $rule => $type)
	{
		$rule = preg_quote($rule);
		switch( $type )
		{
			case START   : $pattern = '#^'.$rule.'#i';  break;
			case END     : $pattern = '#'.$rule.'$#i';  break;
			case CONTAIN : $pattern = '#'.$rule.'#i';   break;
			case MATCH   : $pattern = '#^'.$rule.'$#i'; break;
		}
		if( preg_match($pattern, $url) )
			return false;
	}

	return true;
}
?>