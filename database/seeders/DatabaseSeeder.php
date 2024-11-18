<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Jouet::insert(['id' => 1, 'nom' => 'Blahaj', 'type' => 'Peluche', 'stock' => 336, 'prix' => 24.99 ]);
        \App\Models\Jouet::insert(['id' => 2, 'nom' => 'Furbies', 'type' => 'Peluche', 'stock' => 281, 'prix' => 44.99 ]);
        \App\Models\Jouet::insert(['id' => 3, 'nom' => 'Djungelskog', 'type' => 'Peluche', 'stock' => 257, 'prix' => 29.99 ]);
        \App\Models\Jouet::insert(['id' => 4, 'nom' => 'Mogwai', 'type' => 'Peluche', 'stock' => 555, 'prix' => 49.99 ]);
        \App\Models\Jouet::insert(['id' => 5, 'nom' => 'Phoque', 'type' => 'Peluche', 'stock' => 214, 'prix' => 24.99 ]);
        \App\Models\Jouet::insert(['id' => 6, 'nom' => 'Poupée Annabelle', 'type' => 'Poupée', 'stock' => 1, 'prix' => 499.99 ]);
        \App\Models\Jouet::insert(['id' => 7, 'nom' => 'Pack figurines Totally Spies', 'type' => 'Figurines', 'stock' => 464, 'prix' => 14.99 ]);
        \App\Models\Jouet::insert(['id' => 8, 'nom' => 'Transformers', 'type' => 'Figurines', 'stock' => 523, 'prix' => 19.99 ]);
        \App\Models\Jouet::insert(['id' => 9, 'nom' => 'Power Rangers', 'type' => 'Figurines', 'stock' => 493, 'prix' => 19.99 ]);
        \App\Models\Jouet::insert(['id' => 10, 'nom' => 'Dragon Ball', 'type' => 'Figurines', 'stock' => 561, 'prix' => 29.99 ]);
        \App\Models\Jouet::insert(['id' => 11, 'nom' => 'Bakugan', 'type' => 'Figurines', 'stock' => 367, 'prix' => 12.99 ]);
        \App\Models\Jouet::insert(['id' => 12, 'nom' => 'Barbies', 'type' => 'Poupée', 'stock' => 706, 'prix' => 14.99 ]);
        \App\Models\Jouet::insert(['id' => 13, 'nom' => 'Miraculous', 'type' => 'Figurines', 'stock' => 687, 'prix' => 18.99 ]);
        \App\Models\Jouet::insert(['id' => 14, 'nom' => 'Set Cuisine', 'type' => 'Set', 'stock' => 120, 'prix' => 159.99 ]);
        \App\Models\Jouet::insert(['id' => 15, 'nom' => 'Set Bricolage', 'type' => 'Set', 'stock' => 120, 'prix' => 159.99 ]);
        \App\Models\Jouet::insert(['id' => 16, 'nom' => 'Minicar Garçon', 'type' => 'Voiture', 'stock' => 157, 'prix' => 199.99 ]);
        \App\Models\Jouet::insert(['id' => 17, 'nom' => 'Minicar Fille', 'type' => 'Voiture', 'stock' => 158, 'prix' => 199.99 ]);
        \App\Models\Jouet::insert(['id' => 18, 'nom' => 'Pack Ultramarines', 'type' => 'Figurines', 'stock' => 400, 'prix' => 79.99 ]);
        \App\Models\Jouet::insert(['id' => 19, 'nom' => 'Pack Blood Angels', 'type' => 'Figurines', 'stock' => 400, 'prix' => 79.99 ]);
        \App\Models\Jouet::insert(['id' => 20, 'nom' => 'Pack Dark Angels', 'type' => 'Figurines', 'stock' => 400, 'prix' => 79.99 ]);
        \App\Models\Jouet::insert(['id' => 21, 'nom' => 'Pack Space Wolves', 'type' => 'Figurines', 'stock' => 400, 'prix' => 79.99 ]);
        \App\Models\Jouet::insert(['id' => 22, 'nom' => 'Pack Carcharodons', 'type' => 'Figurines', 'stock' => 400, 'prix' => 79.99 ]);
        \App\Models\Jouet::insert(['id' => 23, 'nom' => 'Pack Salamanders', 'type' => 'Figurines', 'stock' => 400, 'prix' => 79.99 ]);
        \App\Models\Jouet::insert(['id' => 24, 'nom' => 'Pack Black Templars', 'type' => 'Figurines', 'stock' => 400, 'prix' => 79.99 ]);
        \App\Models\Jouet::insert(['id' => 25, 'nom' => 'Pack Blood Ravens', 'type' => 'Figurines', 'stock' => 400, 'prix' => 79.99 ]);
        \App\Models\Jouet::insert(['id' => 26, 'nom' => 'Commander Deck LotR:HoM', 'type' => 'Cartes', 'stock' => 200, 'prix' => 99.99 ]);
        \App\Models\Jouet::insert(['id' => 27, 'nom' => 'Commander Deck MorneBrune:Valgavoth', 'type' => 'Cartes', 'stock' => 200, 'prix' => 84.99 ]);
        \App\Models\Jouet::insert(['id' => 28, 'nom' => 'Deck de structure Yu-Gi-Oh - Pack Spécial : Decks Légendaires II', 'type' => 'Cartes', 'stock' => 200, 'prix' => 45.99 ]);
        \App\Models\Jouet::insert(['id' => 29, 'nom' => 'Booster Pokemon : Tempête Plasma', 'type' => 'Cartes', 'stock' => 250, 'prix' => 6.99 ]);
        \App\Models\Jouet::insert(['id' => 30, 'nom' => 'Booster MTG : LotR', 'type' => 'Cartes', 'stock' => 250, 'prix' => 5.99 ]);
        \App\Models\Jouet::insert(['id' => 31, 'nom' => 'Booster Yu-Gi-Oh : Phantom of the Past', 'type' => 'Cartes', 'stock' => 300, 'prix' => 7.99 ]);





    }
}
