<?php
namespace App\Services\API;

use Cache;

class BestBuy{
    protected $accessToken;

    public function __Construct(array $config = []){
        $this->accessToken = $config['accessToken'];
    }

    public function search($searchTerm){

        if(Cache::get($searchTerm)){
            $jsonString = Cache::get($searchTerm);
        }else{
            $token = $this->accessToken;
            $url = "https://api.bestbuy.com/v1/products((search=$searchTerm))?apiKey=$token&sort=customerReviewAverage.dsc&show=name,image,condition,customerReviewAverage,features.feature&pageSize=25&format=json";
            $jsonString = file_get_contents($url);
            Cache::put($searchTerm, $jsonString, 30);
        }

        $results = json_decode($jsonString);


        $productList=[];

        foreach($results->products as $product) {
            if (empty($product->name) || empty($product->condition) || empty($product->customerReviewAverage) || empty($product->features)|| empty($product->image)) {
            }
            else {
                $productList[]=$product;
            }
        }

        return $productList;

    }

}



//https://api.bestbuy.com/v1/products((search=$HP))?apiKey=9ybcmx2ymwhzuqgwbuq2un9u&sort=customerReviewAverage.dsc&show=name,condition,customerReviewAverage,features.feature&pageSize=20&callback=JSON_CALLBACK&format=json