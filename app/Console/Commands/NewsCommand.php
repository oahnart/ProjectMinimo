<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class NewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'new:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        return DB::table('news')->insert([
            'name' => 'More than just a music festival2',
            'news_image_intro'=>'upload/news/21475minimo2.jpg',
            'category_id' => '5',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit'
        ]);
    }
}
