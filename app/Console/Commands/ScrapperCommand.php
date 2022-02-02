<?php

namespace App\Console\Commands;

use App\Services\ScrapperService;
use Illuminate\Console\Command;

class ScrapperCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrapper:run {--link=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For Scrapping for website';
    /**
     * @var ScrapperService
     */
    private $scapperService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ScrapperService $scrapperService)
    {
        $this->scapperService = $scrapperService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = $this->scapperService->scrap($this->option('link'));
        if ($response['error']){
            $this->error($response['message']);
        }
        else{
            $this->line($response['message']);
        }
        return 0;
    }
}
