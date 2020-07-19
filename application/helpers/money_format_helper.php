<?php 

function money_word_format($money) {
    $result = 0;
    
    if($money/1000000000000 >= 1) 
        $result = number_format((float)($money/1000000000000), 2, '.','').' T';
    else {
        if($money/1000000000 >= 1) $result = number_format((float)($money/1000000000), 2, '.', '').'M';

        else $result = number_format((float)($money/1000000), 2, '.', '').' JT';
    }

    return $result;
}