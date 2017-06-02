<?php 

namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;


class SearchComponent extends Component
{

	/**
	 * Save search into history
	 * @param string $str 
	 * @return bool
	 */
	public function register($str) {
		
		$str = strip_tags(trim($str));

		if(!$this->Searches) {
			$this->Searches = TableRegistry::get('Searches');
		}

		if(!$this->SearchPerforms) {
			$this->SearchPerforms = TableRegistry::get('SearchPerforms');
		}

		$q = $this->Searches->findByQuery($str)->first();

		if(is_null($q)) {
			$q = $this->Searches->newEntity();
			$q->add_date = date('Y-m-d H:i:s');
			$q->query = $str;

			if(!$this->Searches->save($q)) {
				return FALSE;
			}
		}

		$o = $this->SearchPerforms->newEntity();
		$o->add_date = date('Y-m-d H:i:s');
		$o->search_id = $q->id;

		if(!$this->SearchPerforms->save($o)) {
			return FALSE;
		}

		return TRUE;

	}

}