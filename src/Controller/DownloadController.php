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
class DownloadController extends AppController
{
	public function index() {

		$this->loadModel('Items');

		$last = $this->Items->find('all' , [
					'join' => [
						'table' => 'item_downloads', 
						'alias' => 't1', 
						'type' => 'inner',
						'conditions' => [
							't1.item_id = Items.id'
						]
					], 
					'order' => [
						't1.add_date' => 'desc'
					], 
					'group' => [
						'Items.id'
					], 
					'limit' => 5
				])
			->toArray();

		$top = $this->Items->find('all' , [
					'fields' => array_merge(
							$this->Items->schema()->columns(), 
							['t1.n']
						),
					'join' => [
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
					'limit' => 5
				])
			->toArray();

		$this->set(compact('top', 'last'));

	}

	public function convert() {

		$t = $this->request->getData();

		if(!isset($t['link'])) {
			$this->error(__('You must paste youtube link'));
		}

		if(!strlen(trim($t['link']))) {
			$this->error(__('You must paste youtube link'));
		}

		if(stripos($t['link'], 'youtube') === false) {
			$this->error(__('Your link is not valid'));
		}

		if(!$parse = $this->url($t['link'])) {
			$this->error(__('Your link is not valid'));
		}

		$content = file_get_contents('http://www.youtubeinmp3.com/fetch/?format=JSON&filesize=1&video='.$t['link']);
		$response = @json_decode($content);

		if(!isset($response->link)) {

			$this->data([
					'iframe' => true, 
					'link' => 'https://www.youtube.com/watch?v='.$parse
				]);
		}

		$this->loadModel('Items');
		$hash = crc32($parse);
		$o = $this->Items->findByLinkHash($hash)->first();

		if(is_null($o)) {
			$o = $this->Items->newEntity();
			$o->add_date = date('Y-m-d H:i:s');
			$o->title = $response->title ?? '(untitled)';
			$o->link = $parse; 
			$o->link_hash = $hash;
			$o->length = $response->length ?? 0;
			$o->size = $response->filesize ?? 0;

			if(!$this->Items->save($o)) {
				$this->error(__('Server fault'));
			}

		}

		$this->data([
				'e' => $o->id, 
				'link' => $response->link
			]);

		die;
	}

	private function url($url){
	    $r = '/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/';
	    preg_match($r, $url, $match);
	    return ($match && strlen($match[7]) == 11) ? $match[7] : false;
	}	

	public function download() {
		
		$t = $this->request->getData();
		$this->loadModel('Items');
		$this->loadModel('ItemDownloads');

		$item = $this->Items->findById($t['e'])->first();

		if(!is_null($item)) {
			$o = $this->ItemDownloads->newEntity();
			$o->add_date = date('Y-m-d H:i:s');
			$o->item_id = $item->id;

			$this->ItemDownloads->save($o);
		}

		die;
	}

	public function force() {
		
		$t = $this->request->getData();


		if(!$parse = $this->url($t['link'])) {
			die;
		}

		$content = file_get_contents('http://www.youtubeinmp3.com/fetch/?format=JSON&filesize=1&video='.$t['link']);
		$response = @json_decode($content);

		if(!isset($response->link)) {

			$this->data([
					'err' => true, 
				]);
		}

		$this->loadModel('Items');
		$hash = crc32($parse);
		$o = $this->Items->findByLinkHash($hash)->first();

		if(is_null($o)) {
			$o = $this->Items->newEntity();
			$o->add_date = date('Y-m-d H:i:s');
			$o->title = $response->title ?? '(untitled)';
			$o->link = $parse; 
			$o->link_hash = $hash;
			$o->length = $response->length ?? 0;
			$o->size = $response->filesize ?? 0;

			if(!$this->Items->save($o)) {
				$this->error(__('Server fault'));
			}

		}		

		$this->data([
				'e' => $o->id
			]);

	}

	public function play() {
		
		$t = $this->request->getData();
		$this->loadModel('ItemPlays');
		$this->loadModel('Items');

		$item = $this->Items->findById($t['id'])->first();

		if(is_null($item)) {
			die;
		}

		$o = $this->ItemPlays->newEntity();
		$o->add_date = date('Y-m-d H:i:s');
		$o->item_id = $item->id;

		$this->ItemPlays->save($o);
		die;

	}

}