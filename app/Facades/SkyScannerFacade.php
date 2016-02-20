<?php namespace App\Facades;


use GuzzleHttp\Client;


class SkyScannerFacade
{

	private $client;

	public function __construct($apiKey)
	{

		$this->client = new Client([
			'base_url' => ''
			// Base URI is used with relative requests
			// You can set any number of default request options.
		]);

		$this->client->setDefaultOption('headers', ['User-Agent' => "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36"]);

	}




}