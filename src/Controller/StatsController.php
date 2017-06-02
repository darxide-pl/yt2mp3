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
		$this->loadModel('Sessions');
		$this->loadModel('SessionClicks');
		$this->loadModel('SessionViews');

		$this->Session->view('stats');

		$total_mb = $this->megabytes_total();

		$total_dw = $this->total_downloads();
		$total_pl = $this->total_plays();
		$total_udw = $this->total_unique_downloads();
		$total_upl = $this->total_unique_plays();

		$traffic = $this->download_traffic();

		$page_views = $this->page_views();
		$page_visitors = $this->page_visitors();
		$clicks = $this->total_clicks();

		$chart_downloads = $this->chart_downloads();
		$chart_plays = $this->chart_plays();

		$unique_downloads = $this->chart_unique_downloads();

		$this->set(compact(
			'total_mb', 
			'total_dw', 
			'total_pl', 
			'total_udw', 
			'total_upl', 
			'page_views', 
			'page_visitors', 
			'clicks', 
			'traffic', 
			'chart_downloads', 
			'chart_plays', 
			'unique_downloads'
		));

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

	private function page_views() {
		$query = $this->SessionViews->find('all' , [
					'fields' => [
						'total' => 'COUNT(id)'
					]
				])
			->first();

		return $query->total; 
	}

	private function page_visitors() {
		$query = $this->Sessions->find('all' , [
					'fields' => [
						'total' => 'COUNT(id)'
					]
				])
			->first();

		return $query->total;
	}

	private function total_clicks() {
		$query = $this->SessionClicks->find('all' , [
					'fields' => [
						'total' => 'COUNT(id)'
					]
				])
			->first();

		return $query->total;
	}

	private function download_traffic() {
		$query = $this->ItemDownloads->find('all' , [
					'fields' => [
						'd' => 'DATE(ItemDownloads.add_date)', 
						'size' => 'ROUND(SUM(size) /1024 /1024, 2)'
					], 
					'join' => [
						[
							'table' => 'items', 
							'alias' => 't2', 
							'type' => 'inner', 
							'conditions' => [
								't2.id = ItemDownloads.item_id'
							]
						]
					], 
					'group' => [
						'd'
					], 
					'order' => [
						'd' => 'DESC'
					], 
					'limit' => 50
				])
			->toArray();

		$data = [];
		$query = array_reverse($query);
		if(count($query)) {
			foreach($query as $k => $v) {
				$data[$v->d] = $v->size;
			}
		}

		return $data;
	}

	private function chart_downloads() {
		$query = $this->ItemDownloads->find('all' , [
					'fields' => [
						'n' => 'COUNT(id)',
						'd' => 'DATE(add_date)'
					], 
					'group' => ['d'], 
					'order' => [
						'd' => 'DESC'
					], 
					'limit' => 14
				])
			->toArray();

		$data = [];
		$query = array_reverse($query);

		if(count($query)) {
			foreach($query as $v) {
				$data[] = $v->n;
			}
		}

		return $data;
	}

	private function chart_plays() {
		$query = $this->ItemPlays->find('all' , [
					'fields' => [
						'n' => 'COUNT(id)', 
						'd' => 'DATE(add_date)'
					], 
					'group' => ['d'],
					'order' => [
						'd' => 'DESC'
					], 
					'limit' => 14
				])
			->toArray();

		$data = [];
		$query = array_reverse($query);

		if(count($query)) {
			foreach($query as $v) {
				$data[] = $v->n;
			}
		}

		return $data;
	}

	private function chart_unique_downloads() {
		$query = $this->ItemDownloads->find('all' , [
					'fields' => [
						'n' => 'COUNT(DISTINCT(item_id))',
						'd' => 'DATE(add_date)'
					], 
					'group' => ['d'], 
					'order' => [
						'd' => 'DESC'
					], 
					'limit' => 14
				])
			->toArray();

		$data = [];
		$query = array_reverse($query);

		if(count($query)) {
			foreach($query as $v) {
				$data[] = $v->n;
			}
		}

		return $data;
	}

}