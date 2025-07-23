<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

// gerecht categoriën die zijn toegevoegd:
// Ramen, Dessert, Drank, Cocktails

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // == Ramen ==
        DB::table('gerechten')->insert([
        [
            'naam' => 'Ramen Beef',
            'category' => 'ramen',
            'subcategory' => 'rund',
            'prijs' => 14.90,
            'leeftijdsgebonden' => false,
            'beschrijving' => 'Ossenhaas',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => 'Ramen Chicken',
            'category' => 'ramen',
            'subcategory' => 'kip',
            'prijs' => 13.90,
            'leeftijdsgebonden' => false,
            'beschrijving' => 'Gefrituurde kip',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => 'Ramen Chashu',
            'category' => 'ramen',
            'subcategory' => 'varken',
            'prijs' => 13.90,
            'leeftijdsgebonden' => false,
            'beschrijving' => 'Gemarineerd varkensvlees',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => 'Ramen Shrimp',
            'category' => 'ramen',
            'subcategory' => 'garnaal',
            'prijs' => 14.90,
            'leeftijdsgebonden' => false,
            'beschrijving' => 'Gepaneerde garnalen',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => 'Ramen Veggie',
            'category' => 'ramen',
            'subcategory' => 'vegetarisch',
            'prijs' => 12.90,
            'leeftijdsgebonden' => false,
            'beschrijving' => 'Tofu en groenten',
            'created_at' => now(),
            'updated_at' => now()
        ],

        // == desserts ==
        [
            'naam' => 'Vers Fruit',
            'category' => 'dessert',
            'subcategory' => '',
            'prijs' => 2.90,
            'leeftijdsgebonden' => false,
            'beschrijving' => 'Vers fruit mix',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => 'Fruit and Ice Cream',
            'category' => 'dessert',
            'subcategory' => '',
            'prijs' => 4.50,
            'leeftijdsgebonden' => false,
            'beschrijving' => 'Vers fruit met vanille ijs',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => 'Cheesecake',
            'category' => 'dessert',
            'subcategory' => '',
            'prijs' => 5.50,
            'leeftijdsgebonden' => false,
            'beschrijving' => 'Cheesecake met fruit',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => 'Brownie',
            'category' => 'dessert',
            'subcategory' => '',
            'prijs' => 5.50,
            'leeftijdsgebonden' => false,
            'beschrijving' => 'Brownie met vanille ijs',
            'created_at' => now(),
            'updated_at' => now()
        ],

        // == Dranken ==
        [
            'naam' => 'Pepsi',
            'category' => 'drank',
            'subcategory' => '',
            'prijs' => 2.50,
            'leeftijdsgebonden' => false,
            'beschrijving' => 'Peach',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => 'Lipton Ice Tea Sparkling',
            'category' => 'drank',
            'subcategory' => '',
            'prijs' => 2.50,
            'leeftijdsgebonden' => false,
            'beschrijving' => 'Peach',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => 'Lipton Ice Tea Green',
            'category' => 'drank',
            'subcategory' => '',
            'prijs' => 2.50,
            'leeftijdsgebonden' => false,
            'beschrijving' => 'Peach',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => '7-Up',
            'category' => 'drank',
            'subcategory' => '',
            'prijs' => 2.50,
            'leeftijdsgebonden' => false,
            'beschrijving' => 'Peach',
            'created_at' => now(),
            'updated_at' => now()
        ],

        // == Cocktails ==
        [
            'naam' => 'Pornstar Martini',
            'category' => 'cocktails',
            'subcategory' => '',
            'prijs' => 10.90,
            'leeftijdsgebonden' => true,
            'beschrijving' => 'Vodka / vanilla / passion fruit',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => 'Espresso Martini',
            'category' => 'cocktails',
            'subcategory' => '',
            'prijs' => 10.90,
            'leeftijdsgebonden' => true,
            'beschrijving' => 'Vodka / espresso / coffee liqour',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => 'Koneo Love',
            'category' => 'cocktails',
            'subcategory' => '',
            'prijs' => 10.90,
            'leeftijdsgebonden' => true,
            'beschrijving' => 'Lemon soda / yakult / soju',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => 'Mojito',
            'category' => 'cocktails',
            'subcategory' => '',
            'prijs' => 9.90,
            'leeftijdsgebonden' => true,
            'beschrijving' => 'Mint / lime / rum / sugar',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => 'Strawberry Mojito',
            'category' => 'cocktails',
            'subcategory' => '',
            'prijs' => 9.90,
            'leeftijdsgebonden' => true,
            'beschrijving' => 'Strawberry rum / mint / lime / sugar',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => 'Tokyo Breeze',
            'category' => 'cocktails',
            'subcategory' => '',
            'prijs' => 9.90,
            'leeftijdsgebonden' => true,
            'beschrijving' => 'Jinzu Gin / tonic / citrus',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'naam' => 'Watermelon Crush',
            'category' => 'cocktails',
            'subcategory' => '',
            'prijs' => 9.90,
            'leeftijdsgebonden' => true,
            'beschrijving' => 'Watermelon liqour / soda / lime',
            'created_at' => now(),
            'updated_at' => now()
        ]
        
    ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};