<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookSearchTest extends TestCase
{
    public function testFindInTitle(){
        $books = [
            [ "title" => "Introduction to HTML and CSS", "pages" => 432 ],
            [ "title" => "Learning JavaScript Design Patterns", "pages" => 32 ],
            [ "title" => "Object Oriented JavaScript", "pages" => 42 ],
            [ "title" => "JavaScript Web Applications", "pages" => 99 ],
            [ "title" => "PHP Object Oriented Solutions", "pages" => 80 ],
            [ "title" => "PHP Design Patterns", "pages" => 300 ],
            [ "title" => "Head First Java", "pages" => 200 ]
        ];


        $search = new \App\Services\BookSearch($books);
        $results = $search->find('javascript', false);
        $this->assertArraySubset([
            [ "title" => "Learning JavaScript Design Patterns", "pages" => 32 ],
            [ "title" => "Object Oriented JavaScript", "pages" => 42 ],
            [ "title" => "JavaScript Web Applications", "pages" => 99 ]
        ], $results);

    }

    public function testFindExactTitle(){

        $books = [
            [ "title" => "Introduction to HTML and CSS", "pages" => 432 ],
            [ "title" => "Learning JavaScript Design Patterns", "pages" => 32 ],
            [ "title" => "Object Oriented JavaScript", "pages" => 42 ],
            [ "title" => "JavaScript Web Applications", "pages" => 99 ],
            [ "title" => "PHP Object Oriented Solutions", "pages" => 80 ],
            [ "title" => "PHP Design Patterns", "pages" => 300 ],
            [ "title" => "Head First Java", "pages" => 200 ]
        ];


        $search = new \App\Services\BookSearch($books);
        $results = $search->find('learning javaScript design patterns', true);
        $this->assertArraySubset([
            [ "title" => "Learning JavaScript Design Patterns", "pages" => 32 ]
        ], $results);

    }

    public function testSearchNonexistentTitle(){

        $books = [
            [ "title" => "Introduction to HTML and CSS", "pages" => 432 ],
            [ "title" => "Learning JavaScript Design Patterns", "pages" => 32 ],
            [ "title" => "Object Oriented JavaScript", "pages" => 42 ],
            [ "title" => "JavaScript Web Applications", "pages" => 99 ],
            [ "title" => "PHP Object Oriented Solutions", "pages" => 80 ],
            [ "title" => "PHP Design Patterns", "pages" => 300 ],
            [ "title" => "Head First Java", "pages" => 200 ]
        ];


        $search = new \App\Services\BookSearch($books);
        $results = $search->find('The Definitive Guide to Symfony', true);
        $this->assertEquals(false, $results);

    }


}
