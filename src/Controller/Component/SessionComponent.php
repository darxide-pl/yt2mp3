<?php 

namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;


class SessionComponent extends Component
{

	public $components = ['Cookie'];

	/**
	 * Register page view
	 * @param string $page 
	 * @return bool
	 */
	public function view($page = FALSE) {
		
		if(!$page) {
			return FALSE;
		}

		if(!$this->SessionViews) {
			$this->SessionViews = TableRegistry::get('SessionViews');
		}

		if(!$session = $this->init()) {
			return FALSE;
		}

		$view = $this->SessionViews->newEntity();
		$view->add_date = date('Y-m-d H:i:s');
		$view->session_id = $session; 
		$view->page = $page;

		if(!$this->SessionViews->save($view)) {
			return FALSE;
		}

		return TRUE;
	}

	/**
	 * Register click
	 * @param string $action 
	 * @return bool
	 */
	public function click($action = FALSE) {
		
		if(!$action) {
			return FALSE;
		}

		if(!$this->SessionClicks) {
			$this->SessionClicks = TableRegistry::get('SessionClicks');
		}

		if(!$session = $this->init()) {
			return FALSE;
		}

		$click = $this->SessionClicks->newEntity();
		$click->add_date = date('Y-m-d H:i:s');
		$click->session_id = $session;
		$click->action = $action;

		if(!$this->SessionClicks->save($click)) {
			return FALSE;
		}
		
		return TRUE;
	}

	/**
	 * Init session - save to dabase and cookie
	 * @return int|bool session_id or false
	 */
	private function init() {
		
		$v = $this->Cookie->read('v');

		if($v) {
			return $v;
		}

		$this->Sessions = TableRegistry::get('Sessions');
		$session = $this->Sessions->newEntity();
		$session->add_date = date('Y-m-d H:i:s');
		if(!$this->Sessions->save($session)) {
			return FALSE;
		}

		$this->Cookie->write('v', $session->id);
		return $session->id;
	}

}