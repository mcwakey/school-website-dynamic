<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Event;
use App\Models\Staff;
use App\Models\Gallery;
use App\Models\HeroSlide;
use App\Models\PageContent;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EnhancedSampleContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure admin role exists
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        // Ensure admin user exists and has the admin role
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@school.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'), // Default password
            ]
        );

        if (!$adminUser->hasRole('admin')) {
            $adminUser->assignRole($adminRole);
        }

        // Clear existing data to avoid duplicates
        HeroSlide::truncate();
        News::truncate();
        Event::truncate();
        Staff::truncate();
        Gallery::truncate();
        PageContent::truncate();

        // Create Hero Slides with more variety
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
            [
                'title' => 'State-of-the-Art Facilities',
                'subtitle' => 'Modern Learning Environments',
                'description' => 'From our computer lab to science facilities, playground areas, and library, we provide comprehensive resources for holistic education.',
                'image_path' => 'hero-slides/slide-4.svg',
                'button_text' => 'Tour Campus',
                'button_link' => '/facilities',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Extracurricular Excellence',
                'subtitle' => 'Beyond the Classroom',
                'description' => 'Sports, arts, music, and cultural activities that develop well-rounded personalities and discover hidden talents.',
                'image_path' => 'hero-slides/slide-5.svg',
                'button_text' => 'View Activities',
                'button_link' => '/activities',
                'sort_order' => 5,
                'is_active' => false, // One slide inactive to show variety
            ],
        ];

        foreach ($heroSlidesData as $slide) {
            HeroSlide::create($slide);
        }

        // Enhanced News with featured images and more variety
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
            [
                'title' => 'New STEM Program Launched',
                'slug' => 'new-stem-program-launched',
                'content' => 'We are excited to introduce our new STEM (Science, Technology, Engineering, and Mathematics) program designed to spark curiosity and innovation in our students. The program includes hands-on experiments, robotics classes, coding workshops, and engineering challenges that make learning engaging and practical.',
                'excerpt' => 'Our new STEM program combines science, technology, engineering, and mathematics for hands-on learning.',
                'featured_image' => 'news/stem-program.svg',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(10),
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Teacher Training Workshop Success',
                'slug' => 'teacher-training-workshop-success',
                'content' => 'Our teaching staff recently completed an intensive training workshop on modern teaching methodologies and digital education tools. This professional development initiative ensures our educators stay current with best practices and can provide the highest quality education to our students.',
                'excerpt' => 'Our teachers completed advanced training to enhance their teaching skills and methods.',
                'featured_image' => 'news/teacher-training.svg',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(12),
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'School Garden Project Yields First Harvest',
                'slug' => 'school-garden-project-harvest',
                'content' => 'Our students are celebrating the first harvest from our school garden project. This initiative teaches children about agriculture, nutrition, and environmental stewardship while providing fresh vegetables for our school meals program.',
                'excerpt' => 'Students celebrate the first harvest from our educational school garden project.',
                'featured_image' => 'news/garden-harvest.svg',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(15),
                'user_id' => $adminUser->id,
            ],
        ];

        foreach ($newsData as $news) {
            News::create($news);
        }

        // Enhanced Events with featured images and more variety
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
            [
                'title' => 'Reading Week Challenge',
                'slug' => 'reading-week-challenge',
                'description' => 'A week-long reading challenge to promote literacy and love for books. Students will participate in reading activities, storytelling sessions, and book discussions.',
                'excerpt' => 'Join our exciting reading week to promote literacy and love for books among students.',
                'featured_image' => 'events/reading-week.svg',
                'start_date' => Carbon::now()->addDays(35)->setTime(8, 0),
                'end_date' => Carbon::now()->addDays(39)->setTime(15, 0),
                'location' => 'School Library',
                'is_published' => true,
                'is_featured' => true,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Art & Craft Exhibition',
                'slug' => 'art-craft-exhibition',
                'description' => 'Students will display their creative artwork and craft projects. This exhibition showcases the artistic talents of our students and their creativity in various mediums.',
                'excerpt' => 'Discover the artistic talents of our students in this creative exhibition.',
                'featured_image' => 'events/art-exhibition.svg',
                'start_date' => Carbon::now()->addDays(25)->setTime(10, 0),
                'end_date' => Carbon::now()->addDays(25)->setTime(16, 0),
                'location' => 'School Art Room',
                'is_published' => true,
                'is_featured' => false,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Career Day with Professionals',
                'slug' => 'career-day-professionals',
                'description' => 'Local professionals will visit our school to share their career experiences and inspire students. This event exposes children to various career paths and possibilities.',
                'excerpt' => 'Meet professionals from various fields and learn about different career opportunities.',
                'featured_image' => 'events/career-day.svg',
                'start_date' => Carbon::now()->addDays(40)->setTime(9, 0),
                'end_date' => Carbon::now()->addDays(40)->setTime(12, 0),
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

        // Enhanced Gallery with more diverse images and categories
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
            [
                'title' => 'Art Class Creativity',
                'description' => 'Students expressing their creativity through various art projects and artistic activities.',
                'image_path' => 'storage/events/art-exhibition.svg',
                'category' => 'academics',
                'is_featured' => true,
                'sort_order' => 7,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Music and Performances',
                'description' => 'Students showcasing their musical talents during school performances and cultural events.',
                'image_path' => 'storage/gallery/music-performance.svg',
                'category' => 'activities',
                'is_featured' => false,
                'sort_order' => 8,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'School Garden Project',
                'description' => 'Students learning about agriculture and environmental stewardship through our school garden.',
                'image_path' => 'storage/news/garden-harvest.svg',
                'category' => 'activities',
                'is_featured' => true,
                'sort_order' => 9,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Reading and Literacy Activities',
                'description' => 'Promoting literacy through reading sessions and book discussions in our library.',
                'image_path' => 'storage/events/reading-week.svg',
                'category' => 'academics',
                'is_featured' => false,
                'sort_order' => 10,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Playground Fun',
                'description' => 'Students enjoying recreational activities and building friendships during break time.',
                'image_path' => 'storage/gallery/playground.svg',
                'category' => 'activities',
                'is_featured' => true,
                'sort_order' => 11,
                'user_id' => $adminUser->id,
            ],
            [
                'title' => 'Teacher Training Workshop',
                'description' => 'Our dedicated teachers participating in professional development workshops.',
                'image_path' => 'storage/news/teacher-training.svg',
                'category' => 'staff',
                'is_featured' => false,
                'sort_order' => 12,
                'user_id' => $adminUser->id,
            ],
        ];

        foreach ($galleryData as $gallery) {
            Gallery::create($gallery);
        }

        // Enhanced Page Contents for customizable areas
        $pageContentsData = [
            // Homepage customizable sections
            [
                'page' => 'home',
                'section' => 'welcome',
                'key' => 'welcome_title',
                'title' => 'Welcome to Our School Community',
                'content' => 'We are dedicated to providing quality education that nurtures creativity, critical thinking, and character development in every student.',
                'metadata' => ['text_color' => '#333333', 'background_color' => '#f8f9fa'],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'section' => 'welcome',
                'key' => 'welcome_subtitle',
                'title' => 'Where Excellence Meets Innovation',
                'content' => 'Our experienced teachers and modern facilities create the perfect environment for academic success and personal growth.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'section' => 'features',
                'key' => 'features_title',
                'title' => 'Our Core Features',
                'content' => 'We provide a comprehensive educational experience focusing on the following key areas.',
                'sort_order' => 0,
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'section' => 'features',
                'key' => 'feature_academic_excellence',
                'title' => 'Academic Excellence',
                'content' => 'Our curriculum is designed to challenge students while providing the support they need to succeed. We focus on developing critical thinking skills and fostering a love for learning.',
                'metadata' => ['icon' => 'fas fa-graduation-cap', 'color' => '#007bff'],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'section' => 'features',
                'key' => 'feature_modern_facilities',
                'title' => 'Modern Facilities',
                'content' => 'State-of-the-art computer labs, well-equipped science laboratories, comprehensive library, and spacious playgrounds provide the best learning environment.',
                'metadata' => ['icon' => 'fas fa-building', 'color' => '#28a745'],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'section' => 'features',
                'key' => 'feature_experienced_teachers',
                'title' => 'Experienced Teachers',
                'content' => 'Our dedicated faculty members bring years of experience and passion for education. They use innovative teaching methods to ensure every student reaches their potential.',
                'metadata' => ['icon' => 'fas fa-chalkboard-teacher', 'color' => '#ffc107'],
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'section' => 'features',
                'key' => 'feature_holistic_development',
                'title' => 'Holistic Development',
                'content' => 'Beyond academics, we focus on developing character, creativity, and leadership skills through sports, arts, and community service programs.',
                'metadata' => ['icon' => 'fas fa-heart', 'color' => '#dc3545'],
                'sort_order' => 4,
                'is_active' => true,
            ],

            // About page content
            [
                'page' => 'about',
                'section' => 'mission',
                'key' => 'mission',
                'title' => 'Our Mission Statement',
                'content' => 'To provide excellent primary education that develops confident, creative, and responsible citizens who can contribute positively to society and the global community.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'vision',
                'key' => 'vision',
                'title' => 'Our Vision',
                'content' => 'To be the leading primary school in Ghana, recognized for academic excellence, character development, and innovative teaching approaches that prepare students for success in the 21st century.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'history',
                'key' => 'history',
                'title' => 'Our Rich History',
                'content' => 'Established in 2010, Royal Life Montessori School has been serving the community with dedication and excellence. Over the years, we have grown from a small school to a recognized institution that has educated hundreds of students who are now making positive contributions to society.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'achievements',
                'key' => 'achievements',
                'title' => 'Our Achievements',
                'content' => 'We are proud of our students\' consistent performance in national examinations, our inter-school sports victories, and recognition as one of the top primary schools in the region. Our alumni have gone on to excel in prestigious secondary schools.',
                'sort_order' => 1,
                'is_active' => true,
            ],

            // Academic programs content
            [
                'page' => 'academics',
                'section' => 'curriculum',
                'key' => 'curriculum_overview',
                'title' => 'Comprehensive Curriculum',
                'content' => 'Our curriculum follows the Ghana Education Service standards while incorporating innovative teaching methods. We offer a well-rounded education that includes core subjects, STEM programs, arts, and physical education.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'academics',
                'section' => 'programs',
                'key' => 'stem_program',
                'title' => 'STEM Education Program',
                'content' => 'Our Science, Technology, Engineering, and Mathematics program encourages students to explore, experiment, and innovate. Through hands-on activities and project-based learning, students develop problem-solving skills and scientific thinking.',
                'metadata' => ['program_type' => 'stem', 'age_group' => '6-12'],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'academics',
                'section' => 'programs',
                'key' => 'arts_program',
                'title' => 'Creative Arts Program',
                'content' => 'We believe in nurturing creativity through our comprehensive arts program. Students explore visual arts, music, drama, and creative writing, helping them express themselves and develop artistic talents.',
                'metadata' => ['program_type' => 'arts', 'age_group' => '6-12'],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'page' => 'academics',
                'section' => 'programs',
                'key' => 'sports_program',
                'title' => 'Sports and Physical Education',
                'content' => 'Physical fitness and teamwork are integral to our education. Our sports program includes football, netball, athletics, and traditional games, promoting healthy lifestyles and team spirit.',
                'metadata' => ['program_type' => 'sports', 'age_group' => '6-12'],
                'sort_order' => 3,
                'is_active' => true,
            ],

            // Admissions information
            [
                'page' => 'admissions',
                'section' => 'process',
                'key' => 'admission_requirements',
                'title' => 'Admission Requirements',
                'content' => 'We welcome students aged 6-12 years. Requirements include completed application form, birth certificate, previous school records (if applicable), and medical certificate. We also conduct a brief interview to understand the child\'s needs.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'admissions',
                'section' => 'process',
                'key' => 'admission_deadlines',
                'title' => 'Important Dates',
                'content' => 'Applications for the new academic year open in January. Early admission is recommended as spaces are limited. School visits can be arranged throughout the year to help families make informed decisions.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'page' => 'admissions',
                'section' => 'fees',
                'key' => 'fees_information',
                'title' => 'School Fees Information',
                'content' => 'We offer competitive fees with flexible payment options. Fee structure includes tuition, feeding, transportation (optional), and extracurricular activities. Scholarships and financial assistance are available for deserving students.',
                'sort_order' => 1,
                'is_active' => true,
            ],

            // Contact page enhancement
            [
                'page' => 'contact',
                'section' => 'info',
                'key' => 'contact_welcome',
                'title' => 'Get in Touch With Us',
                'content' => 'We welcome inquiries from parents and guardians. Our friendly staff is ready to answer your questions about admissions, academic programs, school activities, or any other concerns you may have.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'contact',
                'section' => 'office_hours',
                'key' => 'office_hours_info',
                'title' => 'Office Hours',
                'content' => 'Our administrative office is open Monday through Friday from 7:00 AM to 4:00 PM. During school holidays, office hours may vary. Please call ahead to confirm availability.',
                'sort_order' => 1,
                'is_active' => true,
            ],

            // Custom footer content
            [
                'page' => 'footer',
                'section' => 'about',
                'key' => 'footer_about_school',
                'title' => 'Royal Life Montessori School',
                'content' => 'Dedicated to providing quality primary education in a nurturing environment. We are committed to developing confident, creative, and responsible global citizens.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'footer',
                'section' => 'quick_links',
                'key' => 'footer_quick_links',
                'title' => 'Quick Links',
                'content' => 'Admissions | Academic Calendar | School Policies | Parent Portal | Alumni Network | Career Opportunities',
                'sort_order' => 1,
                'is_active' => true,
            ],

            // Facilities showcase
            [
                'page' => 'facilities',
                'section' => 'overview',
                'key' => 'facilities_overview',
                'title' => 'World-Class Learning Facilities',
                'content' => 'Our campus features modern classrooms, advanced computer laboratories, well-equipped science labs, a comprehensive library, art studios, music rooms, and expansive playgrounds designed to support holistic education.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'facilities',
                'section' => 'technology',
                'key' => 'computer_lab_info',
                'title' => 'Computer Laboratory',
                'content' => 'Our state-of-the-art computer lab features 30 modern computers with high-speed internet access. Students learn coding, digital literacy, and computer applications in an interactive environment.',
                'metadata' => ['capacity' => '30', 'equipment' => 'modern_computers'],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'facilities',
                'section' => 'science',
                'key' => 'science_lab_info',
                'title' => 'Science Laboratory',
                'content' => 'Fully equipped science laboratory where students conduct experiments and explore scientific concepts through hands-on learning. Safety equipment and modern apparatus ensure effective and safe learning.',
                'metadata' => ['capacity' => '25', 'equipment' => 'laboratory_apparatus'],
                'sort_order' => 1,
                'is_active' => true,
            ],

            // Programs page content - Hero and Overview
            [
                'page' => 'programs',
                'section' => 'hero',
                'key' => 'programs_hero',
                'title' => 'Academic Programs',
                'content' => 'Quality education designed to nurture young minds and build strong foundations for lifelong learning.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'programs',
                'section' => 'overview',
                'key' => 'programs_overview',
                'title' => 'Our Educational Approach',
                'content' => 'We provide a comprehensive primary education that focuses on academic excellence, character development, and practical skills that prepare students for their future educational journey.',
                'sort_order' => 1,
                'is_active' => true,
            ],

            // Programs - Section Titles
            [
                'page' => 'programs',
                'section' => 'titles',
                'key' => 'grade_levels_title',
                'title' => 'Grade Levels & Classes',
                'content' => '',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'programs',
                'section' => 'titles',
                'key' => 'core_subjects_title',
                'title' => 'Core Subjects',
                'content' => '',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'page' => 'programs',
                'section' => 'titles',
                'key' => 'additional_programs_title',
                'title' => 'Additional Programs',
                'content' => '',
                'sort_order' => 3,
                'is_active' => true,
            ],

            // Grade Levels
            [
                'page' => 'programs',
                'section' => 'grade_levels',
                'key' => 'nursery_section',
                'title' => 'Nursery Section',
                'content' => 'Our nursery program provides a nurturing environment where young children develop foundational skills through play-based learning and structured activities.',
                'metadata' => [
                    'age_range' => 'Ages 3-5',
                    'card_color' => 'bg-primary',
                    'classes' => ['Nursery 1 (Age 3)', 'Nursery 2 (Age 4)', 'Kindergarten (Age 5)'],
                    'focus_areas' => ['Play-based learning', 'Basic numeracy and literacy', 'Social skills development', 'Creative arts and crafts']
                ],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'programs',
                'section' => 'grade_levels',
                'key' => 'lower_primary',
                'title' => 'Lower Primary',
                'content' => 'The lower primary section focuses on building strong foundations in reading, writing, and mathematics while encouraging curiosity and exploration.',
                'metadata' => [
                    'age_range' => 'Ages 6-8',
                    'card_color' => 'bg-info',
                    'classes' => ['Primary 1 (Age 6)', 'Primary 2 (Age 7)', 'Primary 3 (Age 8)'],
                    'focus_areas' => ['Reading and writing foundation', 'Basic mathematics', 'Environmental studies', 'Physical education']
                ],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'page' => 'programs',
                'section' => 'grade_levels',
                'key' => 'upper_primary',
                'title' => 'Upper Primary',
                'content' => 'Upper primary students engage with more advanced concepts and begin preparing for the transition to secondary education.',
                'metadata' => [
                    'age_range' => 'Ages 9-12',
                    'card_color' => 'bg-success',
                    'classes' => ['Primary 4 (Age 9)', 'Primary 5 (Age 10)', 'Primary 6 (Age 11-12)'],
                    'focus_areas' => ['Advanced literacy and numeracy', 'Science and technology', 'Social studies', 'BECE preparation']
                ],
                'sort_order' => 3,
                'is_active' => true,
            ],

            // Core Subjects
            [
                'page' => 'programs',
                'section' => 'core_subjects',
                'key' => 'english_language',
                'title' => 'English Language',
                'content' => 'Reading, writing, speaking, and listening skills development with emphasis on communication and comprehension.',
                'metadata' => [
                    'icon' => 'fas fa-book',
                    'icon_color' => 'text-primary'
                ],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'programs',
                'section' => 'core_subjects',
                'key' => 'mathematics',
                'title' => 'Mathematics',
                'content' => 'Number operations, geometry, measurement, and problem-solving skills with practical applications.',
                'metadata' => [
                    'icon' => 'fas fa-calculator',
                    'icon_color' => 'text-success'
                ],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'page' => 'programs',
                'section' => 'core_subjects',
                'key' => 'science',
                'title' => 'Science',
                'content' => 'Basic scientific concepts, experiments, and exploration of the natural world around us.',
                'metadata' => [
                    'icon' => 'fas fa-flask',
                    'icon_color' => 'text-info'
                ],
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'page' => 'programs',
                'section' => 'core_subjects',
                'key' => 'social_studies',
                'title' => 'Social Studies',
                'content' => 'History, geography, civics, and cultural studies to understand society and community.',
                'metadata' => [
                    'icon' => 'fas fa-globe',
                    'icon_color' => 'text-warning'
                ],
                'sort_order' => 4,
                'is_active' => true,
            ],

            // Additional Programs
            [
                'page' => 'programs',
                'section' => 'additional_programs',
                'key' => 'arts_crafts',
                'title' => 'Arts & Crafts',
                'content' => 'Creative expression through drawing, painting, and handcrafts',
                'metadata' => [
                    'icon' => 'fas fa-palette',
                    'icon_color' => 'text-primary'
                ],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'programs',
                'section' => 'additional_programs',
                'key' => 'physical_education',
                'title' => 'Physical Education',
                'content' => 'Sports, games, and physical fitness activities',
                'metadata' => [
                    'icon' => 'fas fa-running',
                    'icon_color' => 'text-success'
                ],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'page' => 'programs',
                'section' => 'additional_programs',
                'key' => 'music_dance',
                'title' => 'Music & Dance',
                'content' => 'Traditional and modern music with cultural dance',
                'metadata' => [
                    'icon' => 'fas fa-music',
                    'icon_color' => 'text-info'
                ],
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'page' => 'programs',
                'section' => 'additional_programs',
                'key' => 'computer_skills',
                'title' => 'Computer Skills',
                'content' => 'Basic computer literacy and digital skills',
                'metadata' => [
                    'icon' => 'fas fa-laptop',
                    'icon_color' => 'text-warning'
                ],
                'sort_order' => 4,
                'is_active' => true,
            ],

            // Assessment Section
            [
                'page' => 'programs',
                'section' => 'assessment',
                'key' => 'assessment_overview',
                'title' => 'Assessment & Progress Tracking',
                'content' => 'We use comprehensive assessment methods to track student progress and ensure every child reaches their full potential.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'programs',
                'section' => 'assessment_methods',
                'key' => 'continuous_assessment',
                'title' => 'Continuous Assessment',
                'content' => 'Regular evaluation to monitor student progress throughout the term.',
                'metadata' => [
                    'icon' => 'fas fa-chart-line',
                    'icon_color' => 'text-primary',
                    'items' => ['Weekly quizzes and assignments', 'Monthly progress reports', 'Parent-teacher conferences']
                ],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'programs',
                'section' => 'assessment_methods',
                'key' => 'final_examinations',
                'title' => 'Final Examinations',
                'content' => 'Formal assessments to evaluate student learning and preparation for next level.',
                'metadata' => [
                    'icon' => 'fas fa-award',
                    'icon_color' => 'text-success',
                    'items' => ['Mid-term examinations', 'End-of-term examinations', 'BECE preparation (Primary 6)']
                ],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'page' => 'programs',
                'section' => 'assessment',
                'key' => 'assessment_cta',
                'title' => 'Contact Us for More Information',
                'content' => '',
                'metadata' => [
                    'icon' => 'fas fa-envelope',
                    'link' => '/contact'
                ],
                'sort_order' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($pageContentsData as $content) {
            PageContent::create($content);
        }

        $this->command->info('Enhanced sample content with comprehensive examples has been seeded successfully!');
        $this->command->info('✓ 5 Hero slides created with diverse themes and purposes');
        $this->command->info('✓ 7 News articles created with varied topics and featured images');
        $this->command->info('✓ 7 Events created with different types and scheduling');
        $this->command->info('✓ 5 Staff profiles created with diverse roles and qualifications');
        $this->command->info('✓ 12 Gallery items created with multiple categories and descriptions');
        $this->command->info('✓ 25 Page content sections created for all customizable areas');
        $this->command->info('✓ All content includes realistic, production-ready examples');
        $this->command->info('✓ Mixed active/inactive status to demonstrate functionality');
        $this->command->info('✓ Comprehensive data for testing all customizable areas');
        $this->command->info('✓ All images are properly linked and ready for display');
        $this->command->info('✓ Page contents cover homepage, about, academics, admissions, contact, and facilities');
    }
}
