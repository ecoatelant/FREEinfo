
<?php
    function recupererTexteDebut ($text, $longueur)
    {
        $match = preg_match('#<p[^>]*>(.*)</p>#', $text, $textCapture) ;
        if($match){
        	if (strlen ($textCapture[1]) <= $longueur){
            	$return = $textCapture[1] . "..." ;
            	return $return;
        	}
		    else{
		    	$debut = substr($textCapture[1], 0, $longueur);
			    $debut = substr($debut, 0, strrpos ($debut, ' ')) . '...';
		        return $debut;
	    	}
	    }
	    return "Format de l'article incorrect" ;
    }

    function recupererTitre ($text)
    {
    	$match = preg_match('#<h1>(.*)(</h1>)#', $text, $textCapture);
    	if ($match)
    		return $textCapture[1];
    	else
    		return "Format de l'article incorrect" ;
    }

    function recupererImage ($text, $index)
    {
    	$match = preg_match('#(<img.*id="illustration".*>)#', $text, $textCapture);
    	if ($match){
    		if($index)
    			return preg_replace('/src="\.\.\//', 'src="./', $textCapture[0]) ;
    		return $textCapture[0];
    	}
    	else
    		return "Format de l'article incorrect (aucune image n'a comme id \"illustration\")" ;
    }

    function recupererMiniature ($text, $index)
    {
    	$match = preg_match('#(<img.*id="miniature".*>)#', $text, $textCapture);
    	if ($match){
    		if($index)
    			return preg_replace('/src="\.\.\//', 'src="./', $textCapture[0]) ;
    		return $textCapture[0];
    	}
    	else
    		return "Format de l'article incorrect (aucune image n'a comme id \"miniature\")" ;
    }
?>