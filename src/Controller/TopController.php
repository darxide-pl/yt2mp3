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
		
		$this->loadModel('Items');
		$this->Session->view('top');

		$dw_month = $this->downloads_month();
		$dw_year = $this->downloads_year();
		$dw_all = $this->downloads_all();

		$v_month = $this->views_month();
		$v_year = $this->views_year();
		$v_all = $this->views_all();

		$this->set(compact('dw_month', 'dw_year', 'dw_all', 'v_month', 'v_year', 'v_all'));

	}

	public function downloads_month($page = 1) {
		return $this->Items->find('all' , [
					'fields' => array_merge(
							$this->Items->schema()->columns(), 
							['t1.n']
						), 
					'join' => [
						[
							'table' => '(
								SELECT count(id) as n, item_id 
								FROM item_downloads
								WHERE add_date >= \''.date('Y-m-d H:i:s' , strtotime('-1 month')).'\'
								GROUP BY item_id
							)', 
							'alias' => 't1', 
							'type' => 'inner', 
							'conditions' => [
								't1.item_id = Items.id'
							]
						], 
					],
					'order' => [
						'n' => 'desc'
					], 
					'limit' => 10, 
					'page' => $page
				])
			->toArray();		
	}

	public function downloads_year($page = 1) {
		return $this->Items->find('all' , [
					'fields' => array_merge(
							$this->Items->schema()->columns(), 
							['t1.n']
						), 
					'join' => [
						[
							'table' => '(
								SELECT count(id) as n, item_id 
								FROM item_downloads
								WHERE add_date >= \''.date('Y-m-d H:i:s' , strtotime('-1 year')).'\'
								GROUP BY item_id
							)', 
							'alias' => 't1', 
							'type' => 'inner', 
							'conditions' => [
								't1.item_id = Items.id'
							]
						], 
					],
					'order' => [
						'n' => 'desc'
					], 
					'limit' => 10, 
					'page' => $page
				])
			->toArray();		
	}	

	public function downloads_all($page = 1) {
		return $this->Items->find('all' , [
					'fields' => array_merge(
							$this->Items->schema()->columns(), 
							['t1.n']
						), 
					'join' => [
						[
							'table' => '(
								SELECT count(id) as n, item_id 
								FROM item_downloads
								GROUP BY item_id
							)', 
							'alias' => 't1', 
							'type' => 'inner', 
							'conditions' => [
								't1.item_id = Items.id'
							]
						], 
					],
					'order' => [
						'n' => 'desc'
					], 
					'limit' => 10, 
					'page' => $page
				])
			->toArray();		
	}

	public function views_month($page = 1) {
		return $this->Items->find('all' , [
					'fields' => array_merge(
							$this->Items->schema()->columns(), 
							['t1.n']
						), 
					'join' => [
						[
							'table' => '(
								SELECT count(id) as n, item_id 
								FROM item_plays
								WHERE add_date >= \''.date('Y-m-d H:i:s' , strtotime('-1 month')).'\'
								GROUP BY item_id
							)', 
							'alias' => 't1', 
							'type' => 'inner', 
							'conditions' => [
								't1.item_id = Items.id'
							]
						], 
					],
					'order' => [
						'n' => 'desc'
					], 
					'limit' => 10, 
					'page' => $page
				])
			->toArray();		
	}	

	public function views_year($page = 1) {
		return $this->Items->find('all' , [
					'fields' => array_merge(
							$this->Items->schema()->columns(), 
							['t1.n']
						), 
					'join' => [
						[
							'table' => '(
								SELECT count(id) as n, item_id 
								FROM item_plays
								WHERE add_date >= \''.date('Y-m-d H:i:s' , strtotime('-1 year')).'\'
								GROUP BY item_id
							)', 
							'alias' => 't1', 
							'type' => 'inner', 
							'conditions' => [
								't1.item_id = Items.id'
							]
						], 
					],
					'order' => [
						'n' => 'desc'
					], 
					'limit' => 10, 
					'page' => $page
				])
			->toArray();		
	}		

	public function views_all($page = 1) {
		return $this->Items->find('all' , [
					'fields' => array_merge(
							$this->Items->schema()->columns(), 
							['t1.n']
						), 
					'join' => [
						[
							'table' => '(
								SELECT count(id) as n, item_id 
								FROM item_plays
								GROUP BY item_id
							)', 
							'alias' => 't1', 
							'type' => 'inner', 
							'conditions' => [
								't1.item_id = Items.id'
							]
						], 
					],
					'order' => [
						'n' => 'desc'
					], 
					'limit' => 10, 
					'page' => $page
				])
			->toArray();		
	}		

}