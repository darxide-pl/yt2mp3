<?php 

namespace App\Controller\Component;
use Cake\Controller\Component;

class TimeComponent extends Component
{

	public function convert($youtube_time){

	    $start = new \DateTime('@0'); 
	    $start->add(new \DateInterval($youtube_time));
	    $t = $start->format('H:i:s');
	    $tmp = explode(':', $t);
	    if($tmp[0] == '00') {
	    	return implode(':', [$tmp[1], $tmp[2]]);
	    }

	    return $t;

	}   
}