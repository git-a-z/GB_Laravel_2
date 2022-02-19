<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\News;
use App\Services\NewsParser;

class NewsParsingjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $source;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($source)
    {
        $this->source = $source;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(NewsParser $parser)
    {
        $data = $parser->run($this->source);

        $items = $data['items'];
        foreach($items as $item) {
            $news = new News();

            if (isset($news)) {   
                $news->fill([
                    'title' => htmlspecialchars($item['title']),
                    'text' => htmlspecialchars($item['description']),
                    'category_id' => 1,
                ]);
                $news->save();
            }  
        }
    }
}
