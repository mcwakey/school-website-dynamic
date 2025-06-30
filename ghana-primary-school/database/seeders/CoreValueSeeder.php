<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CoreValue;

class CoreValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            [
                'title' => 'Excellence',
                'description' => 'We strive for excellence in all aspects of education and character development.',
                'icon' => 'fas fa-graduation-cap',
                'color' => '#E74C25',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'title' => 'Integrity',
                'description' => 'We promote honesty, respect, and moral values in all our interactions.',
                'icon' => 'fas fa-heart',
                'color' => '#2C5530',
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'title' => 'Innovation',
                'description' => 'We embrace creative thinking and modern teaching methods to enhance learning.',
                'icon' => 'fas fa-lightbulb',
                'color' => '#F7931E',
                'sort_order' => 3,
                'is_active' => true
            ],
            [
                'title' => 'Community',
                'description' => 'We foster a strong sense of community and collaboration among all stakeholders.',
                'icon' => 'fas fa-users',
                'color' => '#E74C25',
                'sort_order' => 4,
                'is_active' => true
            ]
        ];

        foreach ($values as $value) {
            CoreValue::create($value);
        }
    }
}
