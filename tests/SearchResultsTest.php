<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SearchResultsTest extends TestCase
{
    public function testRedirectBackToDvds(){
        $this
            ->visit('/dvds/search')
            ->type('rock', 'movie')
            ->select("Action", 'genre')
            ->select("G", 'rating')
            ->press('Search')
            ->seePageIs('dvds/results?genre=Action&movie=rock&rating=G');
    }
}
