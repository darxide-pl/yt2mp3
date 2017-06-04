<?php  

namespace App\View\Helper;
use Cake\View\Helper;

class ThemeHelper extends Helper
{

	public function get() {

		$this->init();

		if($_COOKIE['theme'] == 'light') {
			return 'light';
		}

		return 'dark';

	}

}