<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perfumes = ['Anasui Secret', 'Manchester', 'Gatsby', 'Magnites Man', 'Malboro', 'Manohara', 'Lonely', 'Nike', 'Escape', 'Diamor', 'Silver', 'Zwitsal', 'Angle Heart', 'Sweet Love', 'Apel', 'Aurel Rox', 'Aqua Lily', 'Aziro Chorome', 'Aquatic', 'Al Madinah', 'Escada Bron Paradise', 'Adelia', 'April Rose', 'Aigner Blue', 'Aigner Black', 'Aigner Feminim', 'Polo Sport', 'Polo Black', 'Perfect', 'Pinky Cipon', 'Harajuku Love', 'Roman Wings', 'Soulmate / Victory Scandalaos', 'Charlie White', 'Raffi Ahmad', 'Christina By Night', 'Chocolate', 'Cappucino', 'Kopiko', 'Anasui Sensi', 'Barcelona', 'Davidov', 'Jilo Platinum', 'Hugo Boss XX', 'Hugo Boss Orange', 'Anasui Dream', 'Choco Chanel', 'Garuda', 'Selena Gomes / DMG Imperatif', 'One Direction', 'Escadamo / Lovely', 'Bubblegum', 'Maher Zain', 'Aigner XX', '212 VIP Man', 'Elisabeth Arden', 'Gucci Flora', 'Lamborgini', 'Katty Perry', 'Antonio Bandareas', 'Pramugari', 'Olla Ramlan', 'Paris Hilton', 'Jaguar Woman', 'Jaguar Vision', 'Jaguar Blue', 'Malaikat Subuh', 'Sultan', '2000 Bunga', 'David Bechkam', 'CK Black', 'Syahrini', 'Misik Hitam', 'Casturi Hitam', 'Casturi Kijang', 'Misik Sahara', 'Safaron Merah', 'Atta Halilintar', 'Raisyah', 'Melati', 'Misik Putih', 'Elle Lancone', 'Sarah Gold Man', 'Bacarat', 'B. Fantasy', 'Bulgari Aqua', 'Bulgari Extreme', 'Dunhil Blue', 'Blackberry', 'Nagita Slavina', 'Midnay Fantasy', 'Taylor Swift / White Rose', 'Love Sarah', 'Sexy Gravity', '1000 Bunga', 'Escada Magnetic', 'Bulgari Jasmani', 'Bulgari Black', 'Blueberry Classic', 'Bulgari Rose', 'Paris Heres', 'Sasa', 'HB Army', 'Black XXX', 'Midnay Rose', 'Sigular', 'Dior Souvage', 'Dior Armani', 'Vanila Blue', 'Vanila Lace', 'Vanila Fresh', 'Vanila Body', 'Vanila Cake', 'Vanila Coklat', 'Vanila Rose', 'White Musk', 'Kenzo Bali', 'Kenzo Batang', 'Soft / Monalisa', 'Body Soft', 'Fantastic', 'Aqua Digo', 'Blueberry London', 'Kenzo Daun', 'Kenzo Flower', 'Jamalon', 'Bulgari Mariner', 'Lady Lady', 'Viva La Juicy', 'Lemon', 'Guest Pink', 'Black Opium', 'Incanto Shine', 'Strawberry', 'Paris Cancang', 'Nikita Wili', 'Nisa Sabyan', 'Pick Up', 'Internity Woman', 'Justin Bieber', 'Marshedes Ben'];

        foreach( $perfumes as $perfume ) {
            Product::create([
                'subcategory_id' => 1,
                'name' => $perfume,
            ]);
        }

        $perfumes = ['Sakura 1/2 L', 'Sakura 1 L', 'Sakura 5 L', 'Bacarat 1 L', 'Downy Black 1 L', 'Downy Black 5 L', 'Happiness 1 L', 'Viliux 1 L'];

        foreach( $perfumes as $perfume ) {    
            Product::create([
                'subcategory_id' => 2,
                'name' => $perfume,
                'price' => 50000
            ]);
        }

        Product::create([
            'subcategory_id' => 3,
            'name' => 'Vanilla Cake',
            'price' => 35000
        ]);

        Product::create([
            'subcategory_id' => 3,
            'name' => 'Lavender',
            'price' => 35000
        ]);

        Product::create([
            'subcategory_id' => 3,
            'name' => 'Apple',
            'price' => 35000
        ]);

        Product::create([
            'subcategory_id' => 3,
            'name' => 'Mawar',
            'price' => 35000
        ]);

        Product::create([
            'subcategory_id' => 3,
            'name' => 'Coklat',
            'price' => 35000
        ]);

        Product::create([
            'subcategory_id' => 3,
            'name' => 'Fresh',
            'price' => 35000
        ]);

        Product::create([
            'subcategory_id' => 3,
            'name' => 'Coconut',
            'price' => 35000
        ]);

        Product::create([
            'subcategory_id' => 4,
            'name' => '3 Botol 100rb',
            'price' => 35000
        ]);

        Product::create([
            'subcategory_id' => 4,
            'name' => 'Thailand - Vanilla',
            'price' => 80000
        ]);

        Product::create([
            'subcategory_id' => 4,
            'name' => 'Thailand - Fantasy',
            'price' => 80000
        ]);

        Product::create([
            'subcategory_id' => 5,
            'name' => '7ml Polos'
        ]);

        Product::create([
            'subcategory_id' => 5,
            'name' => '8ml Berwarna'
        ]);

        Product::create([
            'subcategory_id' => 5,
            'name' => '10ml Polos'
        ]);

        Product::create([
            'subcategory_id' => 5,
            'name' => '10ml Berwarna'
        ]);

        Product::create([
            'subcategory_id' => 5,
            'name' => '12ml Polos'
        ]);

        Product::create([
            'subcategory_id' => 5,
            'name' => '15ml Berwarna'
        ]);

        Product::create([
            'subcategory_id' => 5,
            'name' => '20ml Polos'
        ]);

        Product::create([
            'subcategory_id' => 5,
            'name' => '20ml Berwarna'
        ]);

        Product::create([
            'subcategory_id' => 5,
            'name' => '30ml Polos'
        ]);

        Product::create([
            'subcategory_id' => 5,
            'name' => '30ml Berwarna'
        ]);

        Product::create([
            'subcategory_id' => 5,
            'name' => '50ml Polos'
        ]);

        Product::create([
            'subcategory_id' => 5,
            'name' => '50ml Berwarna'
        ]);

        Product::create([
            'subcategory_id' => 5,
            'name' => '100ml Polos'
        ]);

        Product::create([
            'subcategory_id' => 5,
            'name' => '100ml Berwarna'
        ]);
    }
}
