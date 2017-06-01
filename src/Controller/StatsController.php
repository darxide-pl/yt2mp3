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
		$total_udw = $this->total_unique_downloads();
		$total_upl = $this->total_unique_plays();

		$this->set(compact('total_mb', 'total_dw', 'total_pl', 'total_udw', 'total_upl'));

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

	private function total_unique_downloads() {
		$query = $this->ItemDownloads->find('all' , [
					'fields' => [
						'total' => 'COUNT(DISTINCT(item_id))'
					]
				])
			->first();

		return $query->total;
	}

	private function total_unique_plays() {
		$query = $this->ItemPlays->find('all' , [
					'fields' => [
						'total' => 'COUNT(DISTINCT(item_id))'
					]
				])
			->first();

		return $query->total;		
	}

}