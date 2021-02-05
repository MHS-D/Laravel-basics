<?php

namespace App\Console\Commands;

use App\Http\Controllers\users;
use App\Models\reset;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class pass14 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pass:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'after 14 day pass change';

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
     * @return int
     */
    public function handle()
    {  
        User::where('resset', '=', 0)->update(['resset' => 1]);



            echo 'operation done';
        
       }
}
