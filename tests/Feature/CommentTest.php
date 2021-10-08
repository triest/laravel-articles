<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Email;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class CommentTest extends TestCase
{

  //  use RefreshDatabase;

  //   use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_fail()
    {
        $response = $this->withHeaders([
                                               'Accept' => 'application/json',
                                       ])->post('api/comments');

        $response->assertStatus(422);

    }

    public function test_create_fail_article_not_found(){



        $response = $this->withHeaders([
                                               'Accept' => 'application/json',
                                       ])->post('api/comments',['article_id'=>100522,'subject'=>"saassa",'text'=>"dsdssd"]);

        $response->assertStatus(422);
    }

    public function test_create_cussess_not_found(){

        $article=Article::select(['id'])->first();

        $response = $this->withHeaders([
                                               'Accept' => 'application/json',
                                       ])->post('api/comments',['article_id'=>$article->id,'subject'=>"saassa",'text'=>"dsdssd"]);

        $response->assertStatus(422);
    }

}
