<?php namespace App\Facades;


use GuzzleHttp\Client;


class SkyScannerFacade
{

	private $client;
	private $apiKey;

	public function __construct($apiKey)
	{

		$this->client = new Client([
			// Base URI is used with relative requests
			// You can set any number of default request options.
		]);

		$this->client->setDefaultOption('headers',
			[
				'User-Agent' => "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36",
				'Accept'     => 'application/json'
			]
		);

		$this->apiKey = $apiKey;
	}


	public function getCheapest($from, $to) {
		$res = $this->client->get('http://partners.api.skyscanner.net/apiservices/browsequotes/v1.0/GB/GBP/en-GB/LON/UK/anytime/anytime?apiKey=' .$this->apiKey, [
		]);
	}



}