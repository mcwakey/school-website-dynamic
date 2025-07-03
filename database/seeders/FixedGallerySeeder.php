<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;

class FixedGallerySeeder extends Seeder
{
    public function run()
    {
        // Clear existing gallery entries
        Gallery::truncate();

        // Get actual image files from storage
        $galleryPath = storage_path('app/public/gallery');
        $imageFiles = [];

        if (File::exists($galleryPath)) {
            $files = File::files($galleryPath);
            foreach ($files as $file) {
                $imageFiles[] = 'gallery/' . $file->getFilename();
            }
        }

        // If no actual images, create some sample entries with placeholder
        if (empty($imageFiles)) {
            $imageFiles = [
                'gallery/sample1.jpg',
                'gallery/sample2.jpg',
                'gallery/sample3.jpg'
            ];
        }

        $galleryData = [
            [
                'title' => 'School Sports Day',
                'description' => 'Our annual sports day celebration with students participating in various athletic events.',
                'category' => 'events'
            ],
            [
                'title' => 'Science Fair Exhibition',
                'description' => 'Students showcasing their innovative science projects and experiments.',
                'category' => 'academic'
            ],
            [
                'title' => 'Graduation Ceremony',
                'description' => 'Celebrating our graduating students and their achievements.',
                'category' => 'events'
            ],
            [
                'title' => 'Art Class Activities',
                'description' => 'Creative artwork and projects by our talented students.',
                'category' => 'academic'
            ],
            [
                'title' => 'Field Trip Adventure',
                'description' => 'Educational field trip to the local museum and science center.',
                'category' => 'activities'
            ]
        ];

        foreach ($galleryData as $index => $data) {
            // Use actual image files if available, otherwise use placeholder
            $imagePath = isset($imageFiles[$index]) ? $imageFiles[$index] : $imageFiles[0];

            Gallery::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'image_path' => $imagePath, // No 'storage/' prefix!
                'category' => $data['category'],
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $this->command->info('Gallery seeded with ' . count($galleryData) . ' entries using actual image files.');
    }
}
