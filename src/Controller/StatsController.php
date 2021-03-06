<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

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
		$this->loadModel('SearchPerforms');

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
		$unique_plays = $this->chart_unique_plays();

		$views_month = $this->views_month();

		$click_download = $this->clicks('download');
		$click_convert = $this->clicks('convert');
		$click_play = $this->clicks('play');
		$click_search = $this->clicks('search');

		$top_search = $this->top_search();

		$last_views = $this->last_views();
		$last_visitors = $this->last_visitors();
		$last_clicks = $this->last_clicks();
		$last_search = $this->last_search();

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
			'unique_downloads', 
			'unique_plays',
			'views_month', 
			'click_download', 
			'click_convert', 
			'click_play', 
			'click_search', 
			'top_search', 
			'last_views', 
			'last_visitors', 
			'last_clicks', 
			'last_search'
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

	private function chart_unique_plays() {
		$query = $this->ItemPlays->find('all' , [
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

	private function views_month() {
		$query = $this->SessionViews->find('all' , [
					'fields' => [
						'n' => 'COUNT(id)', 
						'd' => 'DATE(add_date)'
					], 
					'conditions' => [
						'add_date >=' => date('Y-m-d H:i:s' , strtotime('-1 month'))
					], 
					'group' => ['d'],
					'order' => [
						'd' => 'ASC'
					]
				])
			->toArray();

		$data = [];

		if(count($query)) {
			foreach($query as $v) {
				$data[] = $v->n;
			}
		}

		return $data;
	}

	public function clicks($action) {
		$query = $this->SessionClicks->find('all' , [
					'fields' => [
						'n' => 'COUNT(id)'
					], 
					'conditions' => [
						'action' => $action
					]
				])
			->first();

		return $query->n;
	}

	private function top_search() {
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute('
				SELECT *,COUNT(t.search_id) as n 
				FROM ( 
					SELECT t1.search_id, t1.add_date, t2.query 
					FROM search_performs t1 
					INNER JOIN searches t2 ON t2.id = t1.search_id
					ORDER BY t1.add_date DESC
				) AS t 
				GROUP BY t.search_id
				ORDER BY n DESC
				LIMIT 5 
			');

		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}

	private function last_views() {
		$query = $this->SessionViews->find('all' , [
					'fields' => [
						'total' => 'COUNT(id)', 
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
				$data[] = $v->total;
			}
		}

		return $data;
	}

	public function last_visitors() {
		$query = $this->Sessions->find('all' , [
					'fields' => [
						'total' => 'COUNT(id)', 
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
				$data[] = $v->total;
			}
		}

		return $data;
	}

	private function last_clicks() {
		$query = $this->SessionClicks->find('all' , [
					'fields' => [
						'total' => 'COUNT(id)', 
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
				$data[] = $v->total;
			}
		}

		return $data;
	}

	private function last_search() {
		$query = $this->SearchPerforms->find('all' , [
					'fields' => [
						'total' => 'COUNT(id)', 
						'd' => 'DATE(add_date)'
					], 
					'group' => ['d'], 
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
				$data[$v->d] = $v->total;
			}
		}

		return $data;
	}
	
}