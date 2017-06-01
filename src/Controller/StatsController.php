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
class StatsController extends AppController
{

	public function index() {
		
		$this->loadModel('Items');
		$this->loadModel('ItemPlays');
		$this->loadModel('ItemDownloads');

		$total_mb = $this->megabytes_total();
		$total_dw = $this->total_downloads();
		$total_pl = $this->total_plays();

		$this->set(compact('total_mb', 'total_dw', 'total_pl'));

	}

	private function megabytes_total() {
		$query = $this->Items->find('all' , [
					'fields' => [
						'bytes' => '
							sum(size * (
								SELECT COUNT(id) 
								FROM item_downloads
								WHERE item_id = Items.id
							))
						'
					]
				])
			->first();

		return $query->bytes;		
	}

	private function total_downloads() {
		$query = $this->ItemDownloads->find('all' , [
					'fields' => [
						'total' => 'COUNT(id)'
					]
				])
			->first();

		return $query->total;
	}

	private function total_plays() {
		$query = $this->ItemPlays->find('all' , [
					'fields' => [
						'total' => 'COUNT(id)'
					]
				])
			->first();

		return $query->total;		
	}

}