<?php

namespace Apicalls\VendorAPI;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Apicalls extends Client {

   /**
    * @var GuzzleHttp\Client;
    */
    protected $client;

   /**
    * @var GuzzleHttp\Exception\RequestException;
    */
    protected $RequestException;

    /**
     * @param GuzzleHttp\Client $client
     */
    /**
     * @param GuzzleHttp\Exception\RequestException $RequestException
     */

    public function __construct(GuzzleHttp\Client $client,GuzzleHttp\Exception\RequestException $RequestException) {
      $this->client = $client;
      $this->RequestException = $RequestException;

    }

    public function responce() {
      try {
        $response =  $this->client->get('https://swapi.dev/api/people');
        $result = json_decode($response->getBody(), TRUE);
        foreach($result['results'] as $item) {
          $people[] = $item['name']; 
        }
      }
      catch (RequestException $e) {
        // log exception
      }
    }

    public function request() {

    }
    
}