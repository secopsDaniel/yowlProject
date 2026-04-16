<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;
use Illuminate\Support\Str;

class Categories extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['title' => 'Actualités', 'description' => 'Les dernières informations'],
            ['title' => 'Politique', 'description' => 'Actualités politiques'],
            ['title' => 'Économie', 'description' => 'Finance et économie'],
            ['title' => 'Technologie', 'description' => 'Innovations et numérique'],
            ['title' => 'Startups', 'description' => 'Entrepreneuriat et startups'],
            ['title' => 'Business', 'description' => 'Stratégies et entreprises'],
            ['title' => 'Marketing', 'description' => 'Digital et communication'],
            ['title' => 'Tutoriels', 'description' => 'Guides pratiques'],
            ['title' => 'Développement Web', 'description' => 'Programmation web'],
            ['title' => 'Mobile', 'description' => 'Applications mobiles'],
            ['title' => 'Design', 'description' => 'UI/UX et graphisme'],
            ['title' => 'Lifestyle', 'description' => 'Mode de vie'],
            ['title' => 'Santé', 'description' => 'Bien-être et santé'],
            ['title' => 'Sport', 'description' => 'Actualités sportives'],
            ['title' => 'Culture', 'description' => 'Art et culture'],
            ['title' => 'Musique', 'description' => 'Actualités musicales'],
            ['title' => 'Cinéma', 'description' => 'Films et séries'],
            ['title' => 'Éducation', 'description' => 'Apprentissage et formation'],
            ['title' => 'Voyage', 'description' => 'Tourisme et découvertes'],
            ['title' => 'Food', 'description' => 'Cuisine et gastronomie'],
        ];


        foreach ($categories as $cat) {
            Categorie::updateOrCreate([
                'title' => $cat['title'],
                'slug' => Str::slug($cat['title']),
                'description' => $cat['description'],
            ]);
        }
    }
}
