<?php  

namespace App\View\Helper;
use Cake\View\Helper;

class TimeHelper extends Helper
{
	public function format($int = 0) {
		if($int <= 3600) {
			return gmdate('i:s' , $int);
		} 

		return gmdate('H:i:s' , $int);
	}
}