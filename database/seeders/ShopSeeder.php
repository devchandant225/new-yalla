<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Fresh Fruits' => [
                ['name' => 'Organic Bananas', 'price' => 2.99, 'stock' => 150, 'description' => 'A bunch of fresh, organic yellow bananas.'],
                ['name' => 'Red Apples (1kg)', 'price' => 4.50, 'stock' => 100, 'description' => 'Crisp and sweet gala apples.'],
                ['name' => 'Strawberries (250g)', 'price' => 3.25, 'stock' => 60, 'description' => 'Freshly picked juicy red strawberries.'],
                ['name' => 'Navel Oranges (1kg)', 'price' => 5.00, 'stock' => 120, 'description' => 'Sweet and seedless oranges, perfect for juice.'],
                ['name' => 'Green Grapes (500g)', 'price' => 4.00, 'stock' => 80, 'description' => 'Crisp, seedless green grapes.'],
                ['name' => 'Golden Pineapple', 'price' => 3.50, 'stock' => 40, 'description' => 'Large, sweet tropical pineapple.'],
            ],
            'Vegetables' => [
                ['name' => 'Carrots (1kg)', 'price' => 1.80, 'stock' => 200, 'description' => 'Crunchy and sweet orange carrots.'],
                ['name' => 'Fresh Broccoli', 'price' => 2.20, 'stock' => 90, 'description' => 'Nutritious green broccoli heads.'],
                ['name' => 'Baby Spinach (200g)', 'price' => 2.50, 'stock' => 70, 'description' => 'Tender baby spinach leaves, pre-washed.'],
                ['name' => 'Russet Potatoes (2kg)', 'price' => 3.50, 'stock' => 150, 'description' => 'Perfect for baking and mashing.'],
                ['name' => 'Cherry Tomatoes (250g)', 'price' => 2.00, 'stock' => 100, 'description' => 'Sweet and bite-sized red tomatoes.'],
                ['name' => 'Brown Onions (1kg)', 'price' => 1.50, 'stock' => 180, 'description' => 'Essential kitchen staple brown onions.'],
            ],
            'Dairy & Eggs' => [
                ['name' => 'Whole Milk (2L)', 'price' => 3.80, 'stock' => 100, 'description' => 'Fresh, creamy whole milk.'],
                ['name' => 'Cheddar Cheese (500g)', 'price' => 6.50, 'stock' => 80, 'description' => 'Sharp and tasty mature cheddar.'],
                ['name' => 'Greek Yogurt (1kg)', 'price' => 5.20, 'stock' => 60, 'description' => 'Thick and creamy plain Greek yogurt.'],
                ['name' => 'Salted Butter (250g)', 'price' => 3.50, 'stock' => 120, 'description' => 'Premium quality creamery butter.'],
                ['name' => 'Free-Range Eggs (12pk)', 'price' => 5.80, 'stock' => 90, 'description' => 'Farm-fresh large free-range eggs.'],
                ['name' => 'Sour Cream (300ml)', 'price' => 2.40, 'stock' => 50, 'description' => 'Rich and smooth sour cream.'],
            ],
            'Bakery' => [
                ['name' => 'Sourdough Loaf', 'price' => 4.50, 'stock' => 30, 'description' => 'Artisan baked sourdough bread.'],
                ['name' => 'Butter Croissants (4pk)', 'price' => 6.00, 'stock' => 40, 'description' => 'Flaky and buttery French-style croissants.'],
                ['name' => 'Plain Bagels (6pk)', 'price' => 4.20, 'stock' => 50, 'description' => 'Chewy and soft classic bagels.'],
                ['name' => 'Blueberry Muffins (4pk)', 'price' => 7.00, 'stock' => 25, 'description' => 'Soft muffins packed with real blueberries.'],
                ['name' => 'Whole Wheat Bread', 'price' => 3.20, 'stock' => 60, 'description' => 'Healthy and soft whole wheat sandwich bread.'],
                ['name' => 'French Baguette', 'price' => 2.50, 'stock' => 40, 'description' => 'Classic crusty French baguette.'],
            ],
            'Beverages' => [
                ['name' => 'Orange Juice (1L)', 'price' => 4.00, 'stock' => 100, 'description' => '100% pure squeezed orange juice.'],
                ['name' => 'Sparkling Water (1.25L)', 'price' => 1.20, 'stock' => 200, 'description' => 'Refreshing carbonated mineral water.'],
                ['name' => 'Roasted Coffee Beans (500g)', 'price' => 12.00, 'stock' => 40, 'description' => 'Medium roast premium Arabica beans.'],
                ['name' => 'Green Tea Bags (50pk)', 'price' => 5.50, 'stock' => 80, 'description' => 'Antioxidant-rich organic green tea.'],
                ['name' => 'Apple Cider (1L)', 'price' => 4.50, 'stock' => 60, 'description' => 'Crisp and natural apple cider.'],
                ['name' => 'Unsweetened Oat Milk (1L)', 'price' => 3.50, 'stock' => 90, 'description' => 'Creamy plant-based milk alternative.'],
            ],
            'Meat & Poultry' => [
                ['name' => 'Chicken Breast (500g)', 'price' => 7.50, 'stock' => 60, 'description' => 'Lean and tender skinless chicken breast.'],
                ['name' => 'Ground Beef (500g)', 'price' => 8.00, 'stock' => 70, 'description' => 'Premium lean ground beef.'],
                ['name' => 'Pork Chops (400g)', 'price' => 9.50, 'stock' => 40, 'description' => 'Succulent bone-in pork chops.'],
                ['name' => 'Lamb Shanks (2pk)', 'price' => 15.00, 'stock' => 30, 'description' => 'Perfect for slow cooking.'],
                ['name' => 'Turkey Breast (Sliced)', 'price' => 6.00, 'stock' => 50, 'description' => 'Deli-style roasted turkey breast.'],
                ['name' => 'Smoked Bacon (200g)', 'price' => 5.50, 'stock' => 100, 'description' => 'Crispy and flavorful smoked bacon strips.'],
            ],
            'Seafood' => [
                ['name' => 'Salmon Fillet (2pk)', 'price' => 14.00, 'stock' => 40, 'description' => 'Fresh Atlantic salmon fillets.'],
                ['name' => 'Frozen Shrimp (500g)', 'price' => 12.50, 'stock' => 60, 'description' => 'Peeled and deveined large shrimp.'],
                ['name' => 'Tuna Steak (200g)', 'price' => 9.00, 'stock' => 30, 'description' => 'Sashimi-grade yellowfin tuna steak.'],
                ['name' => 'Cod Fillets (400g)', 'price' => 11.00, 'stock' => 45, 'description' => 'Wild-caught white cod fillets.'],
                ['name' => 'Lobster Tail (Single)', 'price' => 18.00, 'stock' => 20, 'description' => 'Premium cold-water lobster tail.'],
                ['name' => 'Lump Crab Meat (170g)', 'price' => 13.50, 'stock' => 35, 'description' => 'Sweet and tender lump crab meat.'],
            ],
            'Snacks' => [
                ['name' => 'Potato Chips (175g)', 'price' => 3.20, 'stock' => 150, 'description' => 'Classic salted crunchy potato chips.'],
                ['name' => 'Mixed Roasted Nuts (200g)', 'price' => 5.50, 'stock' => 100, 'description' => 'A blend of roasted almonds, cashews, and walnuts.'],
                ['name' => 'Microwave Popcorn (3pk)', 'price' => 4.00, 'stock' => 120, 'description' => 'Buttery movie-style popcorn.'],
                ['name' => 'Granola Bars (6pk)', 'price' => 4.50, 'stock' => 90, 'description' => 'Oat and honey energy bars.'],
                ['name' => 'Dark Chocolate Bar (100g)', 'price' => 3.00, 'stock' => 200, 'description' => '70% cocoa rich dark chocolate.'],
                ['name' => 'Salted Pretzels (200g)', 'price' => 2.80, 'stock' => 140, 'description' => 'Classic oven-baked salted pretzels.'],
            ],
            'Pantry Essentials' => [
                ['name' => 'Olive Oil (750ml)', 'price' => 10.50, 'stock' => 80, 'description' => 'Extra virgin cold-pressed olive oil.'],
                ['name' => 'Basmati Rice (2kg)', 'price' => 6.00, 'stock' => 100, 'description' => 'Long-grain aromatic basmati rice.'],
                ['name' => 'Penne Pasta (500g)', 'price' => 1.50, 'stock' => 200, 'description' => 'Durum wheat semolina penne pasta.'],
                ['name' => 'Tomato Pasta Sauce (500g)', 'price' => 3.20, 'stock' => 150, 'description' => 'Traditional basil and tomato sauce.'],
                ['name' => 'All-Purpose Flour (1kg)', 'price' => 2.00, 'stock' => 180, 'description' => 'Fine quality wheat flour.'],
                ['name' => 'Granulated Sugar (1kg)', 'price' => 1.80, 'stock' => 160, 'description' => 'Pure white granulated cane sugar.'],
            ],
            'Frozen Foods' => [
                ['name' => 'Frozen Garden Peas (500g)', 'price' => 2.50, 'stock' => 100, 'description' => 'Quick-frozen tender garden peas.'],
                ['name' => 'Margherita Pizza', 'price' => 6.00, 'stock' => 80, 'description' => 'Classic stone-baked frozen pizza.'],
                ['name' => 'Vanilla Ice Cream (2L)', 'price' => 5.50, 'stock' => 60, 'description' => 'Creamy classic vanilla bean ice cream.'],
                ['name' => 'Frozen Mixed Berries (500g)', 'price' => 7.00, 'stock' => 50, 'description' => 'Blend of strawberries, blueberries, and raspberries.'],
                ['name' => 'Veggie Burgers (4pk)', 'price' => 8.50, 'stock' => 40, 'description' => 'Plant-based delicious veggie patties.'],
                ['name' => 'Fish Sticks (15pk)', 'price' => 5.00, 'stock' => 70, 'description' => 'Golden breaded white fish sticks.'],
            ],
        ];

        foreach ($data as $categoryName => $products) {
            $category = Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName),
                'description' => "Fresh and high-quality $categoryName for your daily needs.",
            ]);

            foreach ($products as $productData) {
                Product::create(array_merge($productData, [
                    'category_id' => $category->id,
                    'slug' => Str::slug($productData['name']),
                    'is_active' => true,
                ]));
            }
        }
    }
}
