<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Event;
use App\Models\Staff;
use App\Models\Gallery;
use App\Models\HeroSlide;
use App\Models\User;
use Carbon\Carbon;

class EnhancedSampleContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::where('email', 'admin@school.com')->first();

        // Clear existing data to avoid duplicates
        HeroSlide::truncate();
        News::truncate();
        Event::truncate();
        Staff::truncate();
        Gallery::truncate();

        // Create Hero Slides
        $heroSlidesData = [
            [
                'title' => 'Royal Life Montessory School',
                'subtitle' => 'Where Young Minds Grow and Dreams Take Flight',
                'description' => 'We provide quality education that nurtures creativity, critical thinking, and character development in a safe and caring environment.',
                'image_path' => 'hero-slides/slide-1.svg',
                'button_text' => 'Learn More',
                'button_link' => '/about',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Excellence in Education',
                'subtitle' => 'Preparing Students for a Bright Future',
                'description' => 'Our experienced teachers and modern facilities create the perfect environment for academic success and personal growth.',
                'image_path' => 'hero-slides/slide-2.svg',
                'button_text' => 'View Programs',
                'button_link' => '/programs',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Join Our Community',
                'subtitle' => 'Building Tomorrow\'s Leaders Today',
                'description' => 'Become part of our vibrant school community where every child is valued, supported, and empowered to reach their full potential.',
                'image_path' => 'hero-slides/slide-3.svg',
                'button_text' => 'Enroll Now',
                'button_link' => '/contact',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($heroSlidesData as $slide) {
            HeroSlide::create($slide);
        }

        // Enhanced News with featured images
        $newsData = [
            [
                'title' => 'Welcome Back to School 2025',
                'slug' => 'welcome-back-to-school-2025',
                'content' => 'We are excited to welcome all our students back for the new academic year. This year promises to be filled with exciting learning opportunities, new facilities, and engaging activities that will help our students grow academically and personally. Our dedicated teachers have prepared innovative lesson plans and exciting projects to make learning both fun and meaningful.',
                'excerpt' => 'We are excited to welcome all our students back for the new academic year with exciting opportunities ahead.',
                'featured_image' => 'news/welcome-back.svg',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(5),
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'New State-of-the-Art Computer Lab Opening',
                'slug' => 'new-computer-lab-opening',
                'content' => 'We are proud to announce the opening of our state-of-the-art computer laboratory. Equipped with 30 modern computers, high-speed internet, and the latest educational software, this facility will enhance our students\' digital literacy skills and prepare them for the technological demands of the future. The lab features interactive whiteboards, programming tools, and coding platforms designed specifically for primary school students.',
                'excerpt' => 'Our new state-of-the-art computer laboratory is now open for students to enhance their digital skills.',
                'featured_image' => 'news/computer-lab-opening.svg',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(3),
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Inter-School Sports Competition Victory',
                'slug' => 'inter-school-sports-competition-victory',
                'content' => 'Our school team has achieved remarkable success in the recent inter-school sports competition. Our students won gold medals in athletics, football, and netball, demonstrating their dedication and hard work in sports training. Special congratulations to our athletics team who broke three school records during the competition. This victory showcases not only our students\' athletic abilities but also their teamwork, sportsmanship, and determination.',
                'excerpt' => 'Our school team achieved remarkable success with gold medals in the recent inter-school sports competition.',
                'featured_image' => 'news/sports-victory.svg',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(1),
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Library Expansion Project Completed',
                'slug' => 'library-expansion-completed',
                'content' => 'Our school library has been expanded and renovated to provide a more conducive learning environment for our students. The new library features comfortable reading areas, updated book collections, and dedicated spaces for group study and individual research.',
                'excerpt' => 'Our expanded school library now offers improved facilities and resources for student learning.',
                'featured_image' => 'gallery/library.svg',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(7),
                'user_id' => $adminUser->id,
            ],
        ];

        foreach ($newsData as $news) {
            News::create($news);
        }

        // Enhanced Events with featured images
        $eventsData = [
            [
                'title' => 'Annual Sports Day 2025',
                'slug' => 'annual-sports-day-2025',
                'description' => 'Join us for our exciting Annual Sports Day where students will showcase their athletic talents in various competitions including track and field events, football, netball, and relay races. Parents and guardians are warmly invited to cheer for their children and enjoy the festive atmosphere.',
                'excerpt' => 'Join us for our exciting Annual Sports Day with various athletic competitions for all students.',
                'featured_image' => 'events/sports-day.svg',
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
                'description' => 'An important meeting for all parents to discuss their children\'s academic progress with teachers. This is an opportunity to understand your child\'s strengths and areas for improvement, as well as to collaborate on strategies to support their continued success.',
                'excerpt' => 'Important meeting for parents to discuss their children\'s academic progress with teachers.',
                'featured_image' => 'events/parent-teacher-conference.svg',
                'start_date' => Carbon::now()->addDays(7)->setTime(14, 0),
                'end_date' => Carbon::now()->addDays(7)->setTime(17, 0),
                'location' => 'School Main Hall',
                'is_published' => true,
                'is_featured' => true,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Science Fair Exhibition',
                'slug' => 'science-fair-exhibition',
                'description' => 'Students will present their innovative science projects and experiments covering topics from environmental science to robotics. Come witness the creativity and scientific thinking of our young scientists as they demonstrate their discoveries and inventions.',
                'excerpt' => 'Students will present their innovative science projects and experiments in this exciting fair.',
                'featured_image' => 'events/science-fair.svg',
                'start_date' => Carbon::now()->addDays(20)->setTime(10, 0),
                'end_date' => Carbon::now()->addDays(20)->setTime(15, 0),
                'location' => 'School Science Laboratory',
                'is_published' => true,
                'is_featured' => true,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Cultural Day Celebration',
                'slug' => 'cultural-day-celebration',
                'description' => 'A celebration of Ghanaian culture featuring traditional dances, music performances, and cultural exhibitions. Students will showcase their knowledge of local traditions and customs.',
                'excerpt' => 'Celebrate Ghanaian culture with traditional performances and exhibitions.',
                'featured_image' => 'gallery/sports-day.svg',
                'start_date' => Carbon::now()->addDays(30)->setTime(9, 0),
                'end_date' => Carbon::now()->addDays(30)->setTime(14, 0),
                'location' => 'School Assembly Hall',
                'is_published' => true,
                'is_featured' => false,
                'user_id' => $adminUser->id,
            ],
        ];

        foreach ($eventsData as $event) {
            Event::create($event);
        }

        // Enhanced Staff with photos
        $staffData = [
            [
                'name' => 'Mrs. Akosua Mensah',
                'position' => 'Principal',
                'department' => 'Administration',
                'bio' => 'Mrs. Mensah has over 15 years of experience in education and is passionate about providing quality education to all students. She holds a Master\'s degree in Educational Leadership and is committed to creating an environment where every child can thrive.',
                'email' => 'principal@ghanaexcellence.edu.gh',
                'phone' => '+233 123 456 789',
                'qualifications' => ['Master of Education in Leadership', 'Bachelor of Arts in Education', 'Teaching Certificate'],
                'photo' => 'staff/staff-placeholder.svg',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Mr. Kwame Asante',
                'position' => 'Mathematics Teacher',
                'department' => 'Mathematics',
                'bio' => 'Mr. Asante specializes in making mathematics fun and accessible for all students through innovative teaching methods. He uses interactive games and real-world applications to help students understand complex mathematical concepts.',
                'email' => 'kwame.asante@ghanaexcellence.edu.gh',
                'phone' => '+233 123 456 790',
                'qualifications' => ['Bachelor of Science in Mathematics', 'Teaching Certificate', 'Mathematics Education Diploma'],
                'subjects' => ['Mathematics', 'General Science'],
                'photo' => 'staff/staff-placeholder.svg',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Miss Ama Osei',
                'position' => 'English Teacher',
                'department' => 'Languages',
                'bio' => 'Miss Osei is dedicated to developing students\' reading, writing, and communication skills in English. She organizes reading clubs and creative writing workshops to foster a love for literature and language.',
                'email' => 'ama.osei@ghanaexcellence.edu.gh',
                'phone' => '+233 123 456 791',
                'qualifications' => ['Bachelor of Arts in English', 'Teaching Diploma', 'TESOL Certificate'],
                'subjects' => ['English Language', 'Literature'],
                'photo' => 'staff/staff-placeholder.svg',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Mr. Kofi Adjei',
                'position' => 'Science Teacher',
                'department' => 'Science',
                'bio' => 'Mr. Adjei brings science to life through hands-on experiments and practical demonstrations. His laboratory sessions are always exciting as students discover scientific principles through interactive learning.',
                'email' => 'kofi.adjei@ghanaexcellence.edu.gh',
                'phone' => '+233 123 456 792',
                'qualifications' => ['Bachelor of Science in Chemistry', 'Teaching Certificate', 'Science Education Diploma'],
                'subjects' => ['General Science', 'Environmental Science'],
                'photo' => 'staff/staff-placeholder.svg',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Mrs. Efua Darko',
                'position' => 'Computer Science Teacher',
                'department' => 'Technology',
                'bio' => 'Mrs. Darko is responsible for our new computer laboratory and digital literacy programs. She teaches coding, computer applications, and digital citizenship to prepare students for the digital age.',
                'email' => 'efua.darko@ghanaexcellence.edu.gh',
                'phone' => '+233 123 456 793',
                'qualifications' => ['Bachelor of Science in Computer Science', 'Teaching Certificate', 'IT Education Diploma'],
                'subjects' => ['Computer Science', 'Digital Literacy'],
                'photo' => 'staff/staff-placeholder.svg',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($staffData as $staff) {
            Staff::create($staff);
        }

        // Enhanced Gallery with more diverse images
        $galleryData = [
            [
                'title' => 'New Computer Laboratory',
                'description' => 'Students learning computer skills in our state-of-the-art computer laboratory equipped with modern technology.',
                'image_path' => 'storage/gallery/computer-lab.svg',
                'category' => 'facilities',
                'is_featured' => true,
                'sort_order' => 1,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Annual Sports Day Activities',
                'description' => 'Students participating in various sports activities during our annual sports day celebration.',
                'image_path' => 'storage/gallery/sports-day.svg',
                'category' => 'events',
                'is_featured' => true,
                'sort_order' => 2,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Students in the Library',
                'description' => 'Students reading and studying in our expanded and well-equipped school library.',
                'image_path' => 'storage/gallery/library.svg',
                'category' => 'facilities',
                'is_featured' => true,
                'sort_order' => 3,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Science Laboratory Experiments',
                'description' => 'Students conducting exciting science experiments and learning through hands-on activities.',
                'image_path' => 'storage/events/science-fair.svg',
                'category' => 'academics',
                'is_featured' => true,
                'sort_order' => 4,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'School Assembly',
                'description' => 'Weekly school assembly where students and teachers come together for announcements and celebrations.',
                'image_path' => 'storage/events/parent-teacher-conference.svg',
                'category' => 'activities',
                'is_featured' => true,
                'sort_order' => 5,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Academic Excellence Awards',
                'description' => 'Celebrating our students\' achievements and academic excellence with awards and recognition.',
                'image_path' => 'storage/news/sports-victory.svg',
                'category' => 'achievements',
                'is_featured' => true,
                'sort_order' => 6,
                'user_id' => $adminUser->id,
            ],
        ];

        foreach ($galleryData as $gallery) {
            Gallery::create($gallery);
        }

        $this->command->info('Enhanced sample content with images has been seeded successfully!');
        $this->command->info('✓ Hero slides created with slideshow images');
        $this->command->info('✓ News articles created with featured images');
        $this->command->info('✓ Events created with featured images');
        $this->command->info('✓ Staff profiles created with placeholder photos');
        $this->command->info('✓ Gallery items created with diverse images');
        $this->command->info('✓ All images are properly linked and ready for display');
    }
}
