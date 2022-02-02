<?php

namespace App\Services;

use App\Models\Article;
use App\Traits\CommandResponse;
use Exception;
use Goutte\Client;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;

class ScrapperService
{
    use CommandResponse;
    /**
     * @throws Exception
     */
    public function scrap($link): array
    {
        if(!in_array($link,array_values(config('scrapper.links')))){
            return $this->error('Link Not Found');
        }
        else{
            $data = $this->generateDataFromLink($link);
            $this->saveData($data);
            return $this->success('Saved');
        }
    }

    private function generateDataFromLink($link)
    {
        if ($link == 'https://news.ycombinator.com/'){
            return $this->getHackerNewsData($link);
        }
    }

    private function getHackerNewsData($link): array
    {
        $client = new Client();
        $page = $client->request('GET', $link);

        $data = [];

        $index = 3;
        foreach ($page->filter('.itemlist tr') as $item){
            $crawler = new Crawler($item);
            $url = !is_null($crawler->filter('.sitebit')->getNode(0)) ? $crawler->filter('.sitebit')->text(): null;
            $points = !is_null($crawler->filter('.athing + tr')->filter('.score')->getNode(0)) ? intval($crawler->filter('.athing + tr')->filter('.score')->text()): null;
            $date = !is_null($crawler->filter('.athing + tr')->filter('.age')->getNode(0)) ? $crawler->filter('.athing + tr')->filter('.age')->attr('title'): null;

            if ($index % 3 == 0 and $crawler->text() != ''){
                $data[]  = [
                    'title' => $crawler->filter('.athing')->filter('.titlelink')->text(),
                    'link' => $url,
                    'points' => $points,
                    'date' => $date,
                ];
            }
            $index++;
        }
        return $data;
    }

    private function saveData(array $data)
    {
        DB::transaction(function () use ($data) {
            foreach ($data as $article){
                Article::query()->updateOrCreate([
                    'title' => $article['title'],
                    'link' => $article['link'],
                    'points' => $article['points'],
                    'creation_date' => $article['date']
                ],[
                    'title' => $article['title'],
                    'link' => $article['link'],
                    'points' => $article['points'],
                    'creation_date' => $article['date']
                ]);
            }
        });

    }
}
