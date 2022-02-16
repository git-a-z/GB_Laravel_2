<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\News;

class ParserController extends Controller
{
    public function index() {
        $xml = XmlParser::load('https://3dnews.ru/news/rss/');

        // dd($xml);

        $data = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_description' => ['uses' => 'channel.description'],
            'items' => ['uses' => 'channel.item[title,description]'],
        ]);

        // dd($data);

        $items = $data['items'];
        foreach($items as $item) {
            // echo $item['title'];
            // echo '<br>';
            // echo $item['description'];
            // echo '<br>';
            $news = new News();

            if (isset($news)) {   
                $news->fill([
                    'title' => htmlspecialchars($item['title']),
                    'text' => htmlspecialchars($item['description']),
                    'category_id' => 4,
                ]);
                $news->save();    
            }  
        }

        return redirect()->route('admin::news::catalog');
    }
}
