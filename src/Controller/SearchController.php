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
class SearchController extends AppController
{

    public function index() {

    }

    public function find() {
        
        $t = $this->request->getData();

        if(!isset($t['query'])) {
            $this->error(__('Nothing to find'));
        }

        if(!strlen(trim($t['query']))) {
            $this->error(__('You must type something'));
        }

        $this->data($this->load($t['query'] , $t['page']));

    }

    public function load($query, $page = FALSE) {

        $t = $this->request->getData();
        $this->loadComponent('Time');
        $this->loadComponent('Search');
        $this->Search->register($query);

        $config = [];
        $config = [
            'q' => $query, 
            'maxResults' => 20, 
            'type' => 'video'
        ];

        if($page) {
            $config['pageToken'] = $page;
        }

        $DEVELOPER_KEY = 'AIzaSyAG1Wsq7A1haXA1hMLIGQrBn9-ZatXYAjs';
        $http = new \GuzzleHttp\Client(['verify' => ROOT.'/cacert.pem']);
        $client = new \Google_Client();
        $client->setHttpClient($http);
        $client->setDeveloperKey($DEVELOPER_KEY);
        $youtube = new \Google_Service_YouTube($client);

        try {
            $searchResponse = $youtube->search->listSearch('id,snippet', $config);

            $videos = '';
            $channels = '';
            $playlists = '';

        } catch (\Google_Service_Exception $e) {
            $this->error($e->getMessage());
        } catch (\Google_Exception $e) {
            $this->error($e->getMessage());
        }           

        $data = [];
        $ids = [];

        foreach($searchResponse['items'] as $searchResult) {
            if($searchResult['id']['kind'] == 'youtube#video') {

                $data['items'][$searchResult['id']['videoId']] = [
                    'id' => $searchResult['id']['videoId'],
                    'title' => $searchResult['snippet']['title'], 
                    'thumb' => $searchResult['snippet']['thumbnails']['high']['url']
                ];

                $ids[] = $searchResult['id']['videoId'];
            }
        }

        $data['prev'] = $searchResponse['prevPageToken'] ?? FALSE;
        $data['next'] = $searchResponse['nextPageToken'] ?? FALSE;

        $details = $this->details($youtube, 'snippet,contentDetails', [
                        'id' => implode(',', $ids)
                    ]);

        foreach($details['items'] as $v) {
            $data['items'][$v['id']]['time'] = $this->Time->convert($v['contentDetails']['duration']);
        }
        
        return $data;
    }

    private function details($service, $part, $params) {
        $params = array_filter($params);
        $response = $service->videos->listVideos(
            $part,
            $params
        );

        return $response;
    }


}