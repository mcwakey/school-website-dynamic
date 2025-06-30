<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School::create([
            'name' => 'Royal Life Montessory School',
            'description' => 'A leading primary school in Ghana committed to providing quality education and nurturing young minds for a brighter future.',
            'address' => 'Suame Kumasi, Ashanti Region, Ghana',
            'phone' => '+233 243 20 9324',
            'email' => 'info@royallifemontessori.com',
            'website' => 'https://royallifemontessori.com',
            'principal_name' => 'Mr. Nkwan',
            'mission' => 'To provide quality education that develops critical thinking, creativity, and character in our students while preserving Ghanaian values and culture.',
            'vision' => 'To be the leading primary school in Ghana, producing confident, creative, and caring global citizens.',
            'established_year' => 2010,
            'social_media' => [
                'facebook' => 'https://facebook.com/ghanaexcellence',
                'twitter' => 'https://twitter.com/ghanaexcellence',
                'instagram' => 'https://instagram.com/ghanaexcellence'
            ],
            'is_active' => true
        ]);
    }
}
