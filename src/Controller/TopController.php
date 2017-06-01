<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 *
 * @method \App\Model\Entity\Item[] paginate($object = null, array $settings = [])
 */
class TopController extends AppController
{

	public function index() {
		
		$this->loadComponent('Time');
		debug($this->Time->parse('07:19'));
		die;

	}

}