<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class AddProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AddProduct';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ability to create a product';

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
        $name = $this->ask('What is Product  name?');
        $description = $this->ask('What is Product  description ?');
        $price = $this->ask('What is Product  price ?');
        $image = $this->ask('What is Product  image url ?');
        try {
            $prod = Product::create([
                'name' => $name,
                'description' => $description,
                'name' => $name,
                'price' => $price,
                'image' => $image]);
            if ($this->confirm('Do you wish to attach categories to product?')) {
                $id = $this->ask('What is category id ?');
                if (is_numeric($id)) {
                    $categories = [$id];
                    $prod->categories()->attach($categories);
                }
            }
            $this->info('success');
        } catch (\Exception $e) {
            $this->error('Something went wrong!' . $e);

        }


    }
}
