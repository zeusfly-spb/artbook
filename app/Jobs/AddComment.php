<?php

namespace App\Jobs;

use App\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddComment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $article;
    private $subject;
    private $body;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(object $data)
    {
        $this->article = Article::find($data->article_id);
        $this->subject = $data->subject;
        $this->body = $data->body;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->article->addComment((object) ['subject' => $this->subject, 'body' => $this->body]);
    }
}
