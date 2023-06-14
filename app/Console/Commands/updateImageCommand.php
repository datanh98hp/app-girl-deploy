<?php

namespace App\Console\Commands;

use App\Entities\Product;
use Illuminate\Console\Command;

class updateImageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:image';

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
        $products = Product::whereNotNull("images")->get();
        foreach ($products as $product) {
            $image = str_replace(["http://103.127.207.24:81/api_ok_xe/public/storage/", "http://103.3.246.99:81/api/api_ok_xe/public/storage/"], "", $product->image);
            $images = json_decode($product->images, true);
            $images = array_map(function ($img) {
                return str_replace(["http://103.127.207.24:81/api_ok_xe/public/storage/", "http://103.3.246.99:81/api/api_ok_xe/public/storage/"], "", $img);
            }, $images);
            $images = json_encode($images);
            $product->update(["image" => $image, "images" => $images]);
            echo "Updated images product $product->id \n";
        }
        exit("Xong! \n");
    }
}
