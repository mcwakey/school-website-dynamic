<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Staff;
use App\Models\Setting;
use App\Models\School;
use App\Models\Document;
use App\Models\HeroSlide;
use App\Models\CoreValue;
use App\Models\AcademicProgram;
use App\Models\AboutSection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{
    public function index()
    {
        try {
            // Check if tables exist before querying
            $school = \Illuminate\Support\Facades\Schema::hasTable('schools') ? School::first() : null;
            $heroSlides = \Illuminate\Support\Facades\Schema::hasTable('hero_slides') ? HeroSlide::active()->ordered()->get() : collect();
            $featuredNews = \Illuminate\Support\Facades\Schema::hasTable('news') ? News::published()->featured()->latest()->limit(3)->get() : collect();
            $upcomingEvents = \Illuminate\Support\Facades\Schema::hasTable('events') ? Event::published()->upcoming()->latest()->limit(3)->get() : collect();
            $featuredGallery = \Illuminate\Support\Facades\Schema::hasTable('galleries') ? Gallery::featured()->latest()->limit(6)->get() : collect();
            $featuredStaff = \Illuminate\Support\Facades\Schema::hasTable('staff') ? Staff::active()->featured()->limit(4)->get() : collect();
            $settings = \Illuminate\Support\Facades\Schema::hasTable('settings') ? Setting::all()->keyBy('key') : collect();
        } catch (\Exception $e) {
            // If database connection fails, provide empty collections
            $school = null;
            $heroSlides = collect();
            $featuredNews = collect();
            $upcomingEvents = collect();
            $featuredGallery = collect();
            $featuredStaff = collect();
            $settings = collect();
        }

        return view('website.index', compact(
            'school',
            'heroSlides',
            'featuredNews',
            'upcomingEvents',
            'featuredGallery',
            'featuredStaff',
            'settings'
        ));
    }

    public function about()
    {
        $school = School::first();
        $staff = Staff::active()->orderBy('sort_order')->get();
        $coreValues = CoreValue::active()->ordered()->get();
        $academicPrograms = AcademicProgram::active()->ordered()->get();
        $aboutSections = AboutSection::active()->ordered()->get();

        return view('website.about', compact(
            'school',
            'staff',
            'coreValues',
            'academicPrograms',
            'aboutSections'
        ));
    }

    public function news()
    {
        $news = News::published()->latest()->paginate(10);
        return view('website.news', compact('news'));
    }

    public function newsShow($slug)
    {
        $article = News::where('slug', $slug)->published()->firstOrFail();
        $relatedNews = News::published()
            ->where('id', '!=', $article->id)
            ->latest()
            ->limit(4)
            ->get();

        return view('website.news-show', compact('article', 'relatedNews'));
    }

    public function events()
    {
        $events = Event::published()->latest()->paginate(10);
        return view('website.events', compact('events'));
    }

    public function eventShow($slug)
    {
        $event = Event::where('slug', $slug)->published()->firstOrFail();
        return view('website.event-show', compact('event'));
    }

    public function gallery()
    {
        $photos = Gallery::latest()->paginate(12);
        $categories = Gallery::select('category')->distinct()->pluck('category');
        return view('website.gallery', compact('photos', 'categories'));
    }

    public function staff()
    {
        try {
            $school = \Illuminate\Support\Facades\Schema::hasTable('schools') ? School::first() : null;
            $staff = \Illuminate\Support\Facades\Schema::hasTable('staff') ? Staff::active()->orderBy('sort_order')->get() : collect();
            $settings = \Illuminate\Support\Facades\Schema::hasTable('settings') ? Setting::all()->keyBy('key') : collect();
        } catch (\Exception $e) {
            $school = null;
            $staff = collect();
            $settings = collect();
        }
        return view('website.staff', compact('school', 'staff', 'settings'));
    }

    public function contact()
    {
        $school = School::first();
        return view('website.contact', compact('school'));
    }

    public function programs()
    {
        $school = School::first();
        return view('website.programs', compact('school'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q', '');
        $results = collect();

        if (strlen($query) >= 2) {
            // Search news
            $news = News::published()
                ->where(function($q) use ($query) {
                    $q->where('title', 'LIKE', "%{$query}%")
                      ->orWhere('content', 'LIKE', "%{$query}%")
                      ->orWhere('excerpt', 'LIKE', "%{$query}%");
                })
                ->latest()
                ->limit(10)
                ->get()
                ->map(function($item) {
                    $item->type = 'news';
                    return $item;
                });

            // Search events
            $events = Event::published()
                ->where(function($q) use ($query) {
                    $q->where('title', 'LIKE', "%{$query}%")
                      ->orWhere('description', 'LIKE', "%{$query}%")
                      ->orWhere('location', 'LIKE', "%{$query}%");
                })
                ->latest()
                ->limit(10)
                ->get()
                ->map(function($item) {
                    $item->type = 'event';
                    return $item;
                });

            // Search gallery
            $gallery = Gallery::where(function($q) use ($query) {
                    $q->where('title', 'LIKE', "%{$query}%")
                      ->orWhere('description', 'LIKE', "%{$query}%")
                      ->orWhere('category', 'LIKE', "%{$query}%");
                })
                ->latest()
                ->limit(5)
                ->get()
                ->map(function($item) {
                    $item->type = 'gallery';
                    return $item;
                });

            $results = $news->merge($events)->merge($gallery);
        }

        return view('website.search', compact('query', 'results'));
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|in:general,admission,academic,event,complaint,other',
            'message' => 'required|string|min:10',
            'privacy_agreement' => 'required|accepted'
        ]);

        // Store the contact message in database or send email
        // For now, just flash a success message

        return redirect()->route('contact')->with('success', 'Thank you for your message! We will get back to you soon.');
    }

    public function documents()
    {
        $categories = ['forms', 'policies', 'newsletters', 'curriculum', 'reports', 'other'];

        $documentsByCategory = [];
        foreach ($categories as $category) {
            $documentsByCategory[$category] = Document::active()
                ->public()
                ->byCategory($category)
                ->orderBy('title')
                ->get();
        }

        $recentDocuments = Document::active()->public()->latest()->limit(5)->get();

        return view('website.documents', compact('documentsByCategory', 'recentDocuments', 'categories'));
    }

    public function downloadDocument(Document $document)
    {
        // Check if document is public and active
        if (!$document->is_public || !$document->is_active) {
            abort(404, 'Document not found');
        }

        if (!Storage::disk('public')->exists($document->file_path)) {
            abort(404, 'File not found');
        }

        // Increment download count
        $document->increment('download_count');

        return Storage::disk('public')->download($document->file_path, $document->file_name);
    }
}
