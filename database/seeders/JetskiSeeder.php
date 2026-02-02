<?php

namespace Database\Seeders;

use App\Models\Jetski;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JetskiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jetskis = [
            [
                'name' => 'Yamaha FX Limited SVHO',
                'description' => 'The Yamaha FX Limited SVHO is the flagship of the FX series, offering a powerful engine and luxury features for the ultimate riding experience.',
                'price_per_hour' => 150.00,
                'image' => 'yamaha-fx-limited-svho.jpg',
                'whatsapp_phone' => '+1234567890',
                'features' => ['Supercharged SVHO Engine', 'RiDE Technology', 'GPS Chart Plotter', 'Bluetooth Audio System'],
                'is_active' => true,
            ],
            [
                'name' => 'Sea-Doo GTX Limited 300',
                'description' => 'Experience the pinnacle of luxury and performance with the Sea-Doo GTX Limited 300. Featuring a powerful 300-hp engine and premium comfort features.',
                'price_per_hour' => 160.00,
                'image' => 'sea-doo-gtx-limited-300.jpg',
                'whatsapp_phone' => '+1234567890',
                'features' => ['300-hp Engine', 'Ergolock Seat', 'Large Swim Platform', 'Direct-Access Front Storage'],
                'is_active' => true,
            ],
            [
                'name' => 'Kawasaki Ultra 310LX',
                'description' => 'The Kawasaki Ultra 310LX is the most powerful personal watercraft in the world, combining high performance with premium features like an integrated audio system.',
                'price_per_hour' => 170.00,
                'image' => 'kawasaki-ultra-310lx.jpg',
                'whatsapp_phone' => '+1234567890',
                'features' => ['310-hp Supercharged Engine', 'JETSOUND 4s Audio', 'Rearview Camera', 'Adjustable Handlebars'],
                'is_active' => true,
            ],
            [
                'name' => 'Sea-Doo Spark Trixx',
                'description' => 'The Sea-Doo Spark Trixx makes pulling off tricks so easy and so much fun, you\'ll never want the day to end.',
                'price_per_hour' => 90.00,
                'image' => 'sea-doo-spark-trixx.jpg',
                'whatsapp_phone' => '+1234567890',
                'features' => ['Lightweight Design', 'Extended Variable Trim System', 'Step Wedges', 'Handlebar with Adjustable Riser'],
                'is_active' => true,
            ],
            [
                'name' => 'Yamaha SuperJet',
                'description' => 'The Yamaha SuperJet is the legendary stand-up watercraft that redefined the segment, offering unmatched agility and control.',
                'price_per_hour' => 110.00,
                'image' => 'yamaha-superjet.jpg',
                'whatsapp_phone' => '+1234567890',
                'features' => ['Stand-up Design', 'TR-1 Marine Engine', 'Adjustable Handlepole', 'Large Padded Foot Tray'],
                'is_active' => true,
            ],
        ];

        foreach ($jetskis as $jetski) {
            $jetski['slug'] = Str::slug($jetski['name']);
            Jetski::create($jetski);
        }
    }
}