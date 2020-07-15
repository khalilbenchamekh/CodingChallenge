<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class AddProduct extends Command
{
    protected $serviceProducts;


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
     * @param ProductService $serviceProducts
     */
    public function __construct(ProductService $serviceProducts)

    {
        parent::__construct();
        $this->serviceProducts = $serviceProducts;

    }


    /**
     * Validates the user input
     *
     * @param array $attributes
     * @return array
     * @throws \Exception
     */
    protected function validateInput(array $attributes)
    {

        $validator = Validator::make($attributes, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['regex:/^[0-9]+(\.[0-9][0-9]?)?$/'],
            'category_id' => 'required|array',
            'category_id.*' => 'integer',
            'image' => ['required', 'string', 'max:255'],
        ]);
        $array = [];
        if ($validator->fails()) {
            $array = $validator->errors();
        }
        return $array;
    }

    public function handle()
    {

        $name = $this->ask('What is Product  name ?');
        $description = $this->ask('What is Product  description ?');
        $price = $this->ask('What is Product  price ?');
        $image = $this->ask('What is Product  image url ?');
        try {


            $category_id = null;
            if ($this->confirm('Do you wish to attach categories to product?')) {
                $id = $this->ask('What is category id ?');
                if (is_numeric($id)) {
                    $category_id = [$id];
                }
            }
            $data = [
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'category_id' => $category_id,
            ];
            $array = $this->validateInput($data);
            if ($array == []) {
                $product = $this->serviceProducts->create($data, $category_id);
                $this->info('success' . $product);
            } else {
                $this->error('Something went wrong!' . $array);
            }

        } catch (\Exception $e) {
            $this->error('Something went wrong!' . $e);

        }

    }
}
