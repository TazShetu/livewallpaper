<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    public function run()
    {
        $Categories = [
            0 => ['Static'],
            1 => ['Live'],
            2 => ['Theme'],
        ];
        foreach ($Categories as $vc) {
            $c = new Category;
            $c->name = $vc[0];
            $c->save();
        }

        $SubCategories = [
            // for Static
            0 => ['Default', 'Trending', 'Today Now', 'Trending Now', 'Sunset', 'Animal', 'Nature', 'Flower', 'Christmas', 'New Year', 'Abstract', 'Music', 'Art', 'Fortnite', 'Cyberpunk', 'Games', 'Super Heroes', '3D'],
            // for Live
            1 => ['Default', 'Nature', 'Sports', 'Sea', 'Sci-fi', 'Abstract', 'Zen', 'Ink', 'Flower', 'Cities', 'Animal'],
            // for Theme
            2 => ['Default'],
        ];
        foreach ($SubCategories as $i => $scs) {
            foreach ($scs as $sc) {
                $s = new SubCategory;
                $s->category_id = $i+1;
                $s->name = $sc;
                $s->save();
            }
        }
    }
}
