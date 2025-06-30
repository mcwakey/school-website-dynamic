<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Event;
use App\Models\Staff;
use App\Models\Gallery;
use App\Models\User;
use Carbon\Carbon;

class SampleContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::where('email', 'admin@school.com')->first();

        // Sample News
        $newsData = [
            [
                'title' => 'Welcome Back to School 2025',
                'slug' => 'welcome-back-to-school-2025',
                'content' => 'We are excited to welcome all our students back for the new academic year. This year promises to be filled with exciting learning opportunities, new facilities, and engaging activities that will help our students grow academically and personally.',
                'excerpt' => 'We are excited to welcome all our students back for the new academic year with exciting opportunities ahead.',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(5),
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'New Computer Lab Opening',
                'slug' => 'new-computer-lab-opening',
                'content' => 'We are proud to announce the opening of our state-of-the-art computer laboratory. Equipped with modern computers and high-speed internet, this facility will enhance our students\' digital literacy skills and prepare them for the technological demands of the future.',
                'excerpt' => 'Our new state-of-the-art computer laboratory is now open for students to enhance their digital skills.',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(3),
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Inter-School Sports Competition Victory',
                'slug' => 'inter-school-sports-competition-victory',
                'content' => 'Our school team has achieved remarkable success in the recent inter-school sports competition. Our students won gold medals in athletics, football, and netball, demonstrating their dedication and hard work in sports training.',
                'excerpt' => 'Our school team achieved remarkable success with gold medals in the recent inter-school sports competition.',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(1),
                'user_id' => $adminUser->id,
            ],
        ];

        foreach ($newsData as $news) {
            News::create($news);
        }

        // Sample Events
        $eventsData = [
            [
                'title' => 'Annual Sports Day 2025',
                'slug' => 'annual-sports-day-2025',
                'description' => 'Join us for our exciting Annual Sports Day where students will showcase their athletic talents in various competitions. Parents and guardians are warmly invited to cheer for their children.',
                'excerpt' => 'Join us for our exciting Annual Sports Day with various athletic competitions for all students.',
                'start_date' => Carbon::now()->addDays(15)->setTime(9, 0),
                'end_date' => Carbon::now()->addDays(15)->setTime(16, 0),
                'location' => 'School Sports Field',
                'is_published' => true,
                'is_featured' => true,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Parent-Teacher Conference',
                'slug' => 'parent-teacher-conference',
                'description' => 'An important meeting for all parents to discuss their children\'s academic progress with teachers. This is an opportunity to understand your child\'s strengths and areas for improvement.',
                'excerpt' => 'Important meeting for parents to discuss their children\'s academic progress with teachers.',
                'start_date' => Carbon::now()->addDays(7)->setTime(14, 0),
                'end_date' => Carbon::now()->addDays(7)->setTime(17, 0),
                'location' => 'School Main Hall',
                'is_published' => true,
                'is_featured' => false,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Science Fair Exhibition',
                'slug' => 'science-fair-exhibition',
                'description' => 'Students will present their innovative science projects and experiments. Come witness the creativity and scientific thinking of our young scientists.',
                'excerpt' => 'Students will present their innovative science projects and experiments in this exciting fair.',
                'start_date' => Carbon::now()->addDays(20)->setTime(10, 0),
                'end_date' => Carbon::now()->addDays(20)->setTime(15, 0),
                'location' => 'School Science Laboratory',
                'is_published' => true,
                'is_featured' => true,
                'user_id' => $adminUser->id,
            ],
        ];

        foreach ($eventsData as $event) {
            Event::create($event);
        }

        // Sample Staff
        $staffData = [
            [
                'name' => 'Mrs. Akosua Mensah',
                'position' => 'Principal',
                'department' => 'Administration',
                'bio' => 'Mrs. Mensah has over 15 years of experience in education and is passionate about providing quality education to all students.',
                'email' => 'principal@ghanaexcellence.edu.gh',
                'phone' => '+233 123 456 789',
                'qualifications' => ['Master of Education', 'Bachelor of Arts in Education'],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Mr. Kwame Asante',
                'position' => 'Mathematics Teacher',
                'department' => 'Mathematics',
                'bio' => 'Mr. Asante specializes in making mathematics fun and accessible for all students through innovative teaching methods.',
                'email' => 'kwame.asante@ghanaexcellence.edu.gh',
                'phone' => '+233 123 456 790',
                'qualifications' => ['Bachelor of Science in Mathematics', 'Teaching Certificate'],
                'subjects' => ['Mathematics', 'General Science'],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Miss Ama Osei',
                'position' => 'English Teacher',
                'department' => 'Languages',
                'bio' => 'Miss Osei is dedicated to developing students\' reading, writing, and communication skills in English.',
                'email' => 'ama.osei@ghanaexcellence.edu.gh',
                'phone' => '+233 123 456 791',
                'qualifications' => ['Bachelor of Arts in English', 'Teaching Diploma'],
                'subjects' => ['English Language', 'Literature'],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Mr. Kofi Adjei',
                'position' => 'Science Teacher',
                'department' => 'Science',
                'bio' => 'Mr. Adjei brings science to life through hands-on experiments and practical demonstrations.',
                'email' => 'kofi.adjei@ghanaexcellence.edu.gh',
                'phone' => '+233 123 456 792',
                'qualifications' => ['Bachelor of Science in Chemistry', 'Teaching Certificate'],
                'subjects' => ['General Science', 'Environmental Science'],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($staffData as $staff) {
            Staff::create($staff);
        }

        // Sample Gallery
        $galleryData = [
            [
                'title' => 'Students in Computer Lab',
                'description' => 'Students learning computer skills in our new computer laboratory',
                'image_path' => 'images/gallery-computer-lab.svg',
                'category' => 'facilities',
                'is_featured' => true,
                'sort_order' => 1,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Sports Day Activities',
                'description' => 'Students participating in various sports activities during our annual sports day',
                'image_path' => 'images/gallery-sports.svg',
                'category' => 'events',
                'is_featured' => true,
                'sort_order' => 2,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Science Experiment',
                'description' => 'Students conducting science experiments in the laboratory',
                'image_path' => 'images/gallery-computer-lab.svg',
                'category' => 'academics',
                'is_featured' => true,
                'sort_order' => 3,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'School Library',
                'description' => 'Students reading and studying in our well-equipped library',
                'image_path' => 'images/gallery-library.svg',
                'category' => 'facilities',
                'is_featured' => true,
                'sort_order' => 4,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Art Class',
                'description' => 'Creative students working on their art projects',
                'image_path' => 'images/about-students.svg',
                'category' => 'academics',
                'is_featured' => true,
                'sort_order' => 5,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'School Assembly',
                'description' => 'Weekly school assembly in the main hall',
                'image_path' => 'images/hero-school.svg',
                'category' => 'activities',
                'is_featured' => true,
                'sort_order' => 6,
                'user_id' => $adminUser->id,
            ],
        ];

        foreach ($galleryData as $gallery) {
            Gallery::create($gallery);
        }
    }
}
