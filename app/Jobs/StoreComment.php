<?php

namespace App\Jobs;

use App\Models\Comment;
use App\Services\ArticleService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class StoreComment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $article_id,$subject,$text;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($article_id,$subject,$text)
    {
        //
        $this->article_id=$article_id;
        $this->subject=$subject;
        $this->text=$text;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $article_servise=new ArticleService();
        $article_servise->storeComment($this->article_id,$this->subject,$this->text);
    }
}
