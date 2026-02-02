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
            [
                'name' => 'Kawasaki STX 160X',
                'description' => 'The Kawasaki STX 160X offers a comfortable riding position and a large fuel tank, making it perfect for long-distance cruising.',
                'price_per_hour' => 120.00,
                'image' => 'kawasaki-stx-160x.jpg',
                'whatsapp_phone' => '+1234567890',
                'features' => ['1,498cc Engine', 'Cruise Control', 'Large Storage Capacity', 'Digital Instrumentation'],
                'is_active' => true,
            ],
            [
                'name' => 'Yamaha VX Deluxe',
                'description' => 'The Yamaha VX Deluxe is one of the most popular watercraft in the industry, known for its reliability and fuel efficiency.',
                'price_per_hour' => 125.00,
                'image' => 'yamaha-vx-deluxe.jpg',
                'whatsapp_phone' => '+1234567890',
                'features' => ['TR-1 HO Engine', 'RiDE Technology', 'Cruiser Seat', 'NanoXcel Hull'],
                'is_active' => true,
            ],
            [
                'name' => 'Sea-Doo Wake Pro 230',
                'description' => 'The Sea-Doo Wake Pro 230 is designed for tow sports, featuring a powerful engine and a specialized pylon for towing.',
                'price_per_hour' => 145.00,
                'image' => 'sea-doo-wake-pro-230.jpg',
                'whatsapp_phone' => '+1234567890',
                'features' => ['230-hp Engine', 'LinQ Retractable Ski Pylon', 'Removable Board Rack', 'WAKE Mode'],
                'is_active' => true,
            ],
            [
                'name' => 'Kawasaki Jet Ski SX-R 1500',
                'description' => 'The Kawasaki SX-R 1500 is a powerful stand-up watercraft that delivers heart-pounding acceleration and sharp handling.',
                'price_per_hour' => 115.00,
                'image' => 'kawasaki-sx-r-1500.jpg',
                'whatsapp_phone' => '+1234567890',
                'features' => ['1,498cc 4-Stroke Engine', 'Performance Hull', 'Large Foot Deck', 'Adjustable Steering'],
                'is_active' => true,
            ],
            [
                'name' => 'Yamaha GP1800R SVHO',
                'description' => 'The Yamaha GP1800R SVHO is a race-ready watercraft that offers blistering speed and precise handling for competitive riders.',
                'price_per_hour' => 155.00,
                'image' => 'yamaha-gp1800r-svho.jpg',
                'whatsapp_phone' => '+1234567890',
                'features' => ['Supercharged SVHO Engine', 'Auto-Trim System', 'Race-Inspired Hull', 'High-Flow Intake Grate'],
                'is_active' => true,
            ],
            [
                'name' => 'Sea-Doo FishPro Trophy 170',
                'description' => 'The Sea-Doo FishPro Trophy 170 is a dedicated fishing watercraft, equipped with everything you need for a successful day on the water.',
                'price_per_hour' => 140.00,
                'image' => 'sea-doo-fishpro-trophy.jpg',
                'whatsapp_phone' => '+1234567890',
                'features' => ['Garmin Fish Finder', 'LinQ Fishing Cooler', 'Modular Swivel Seat', 'Integrated Livewell'],
                'is_active' => true,
            ],
            [
                'name' => 'Yamaha EX Limited',
                'description' => 'The Yamaha EX Limited is a versatile and affordable watercraft that\'s perfect for family fun on the water.',
                'price_per_hour' => 100.00,
                'image' => 'yamaha-ex-limited.jpg',
                'whatsapp_phone' => '+1234567890',
                'features' => ['TR-1 Engine', 'RiDE Technology', 'Pull-Up Cleats', 'Storage Bag'],
                'is_active' => true,
            ],
        ];

        foreach ($jetskis as $jetski) {
            $jetski['slug'] = Str::slug($jetski['name']);
            Jetski::create($jetski);
        }
    }
}
