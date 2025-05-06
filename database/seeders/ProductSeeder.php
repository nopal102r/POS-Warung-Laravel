use App\Models\Product;

public function run()
{
    Product::create([
        'name' => 'Nasi Goreng',
        'price' => 15000,
        'description' => 'Nasi goreng dengan telur dan ayam',
        'category_id' => 1,
    ]);

    Product::create([
        'name' => 'Mie Ayam',
        'price' => 12000,
        'description' => 'Mie ayam dengan pangsit',
        'category_id' => 1,
    ]);
}
