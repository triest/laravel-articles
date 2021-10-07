<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CalculateArticleFields implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info("Calculater work");
        //
        $articles=Article::select(['id'])->orWhereHas('like',function ($q){
            $q->whereBetween('created_at',[now()->subMinutes(1), now()]);
        })->orWhereHas('view',function ($q){
            $q->whereBetween('created_at',[now()->subMinutes(1), now()]);
        })->withCount('like','view' )->get();
        foreach ($articles as $article){
            $article->count_view=$article->view_count;
            $article->count_like=$article->like_count;
            $article->save();
        }

    }
}
