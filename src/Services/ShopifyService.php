<?php 
namespace phpShop\Services;

use GuzzleHttp\Client;

class ShopifyService
{
    private $shopifyApiUrl = '';

    public function getProducts()
    {
        $client = new Client();
        $response = $client->get(%this->shopifyApiUrl . 'products.json' , [
            'headers' => [
              'Āuthorization' => 'Bearer ',  
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        return $data['products'];
    }
}