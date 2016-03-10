<?php

namespace App\Services;

class BookSearch{
    protected $books;
    public function __construct(array $data){
        $this->books = $data;
    }

    public function find($searchTerm, $exactSearch){
        $searchTerm = strtoupper($searchTerm);
        $result = [];
        if($exactSearch){
            foreach($this->books as $book){
                $check = strtoupper($book['title']);
                if($check == $searchTerm){
                    $result[] = $book;
                }
            }
        }
        else{
            foreach($this->books as $book){
                $check = strtoupper($book['title']);
                if(strpos($check, $searchTerm)!==false){
                    $result[] = $book;
                }
            }
        }

        if(empty($result)){
            return false;
        }
        else{
            return $result;
        }

    }
}