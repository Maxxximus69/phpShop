<?php 
namespace phpShop\Controllers;

use phpShop\Services\ShopifyService;

class ShopifyController
{
    public function index()
    {
        include 'templates/layout.html';
    }
    
    public function fetchProducts()
    {

        $client = new \GuzzleHttp\Client();

        $shopifyApiUrl = '';
        $accessToken = '';

        $response = $client->request('GET', $shopifyApiUrl . 'products.json' , [
            'headers' => [
                'Authorization' => 'Bearer' . $accessToken,
            ],
        ]);

        if($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            $products = $data['products'];
        } else {
            echo 'Error: ' . $response->getStatusCode();
        }

        // $shopifyService = new ShopifyService();
        // $products = $shopifyService->getProducts();

        include 'templates/products.html';
    }

    public function statistics()
    {

        include 'templates/statistics.html';
    }
}