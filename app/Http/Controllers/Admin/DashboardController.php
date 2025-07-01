<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Staff;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Dashboard statistics
        $stats = [
            'news_count' => News::count(),
            'published_news' => News::published()->count(),
            'events_count' => Event::count(),
            'upcoming_events' => Event::upcoming()->count(),
            'gallery_count' => Gallery::count(),
            'staff_count' => Staff::count(),
            'users_count' => User::count()
        ];

        // Recent activities
        $recentNews = News::latest()->limit(5)->get();
        $recentEvents = Event::latest()->limit(5)->get();
        $recentGallery = Gallery::latest()->limit(8)->get();

        return view('admin.dashboard', compact('stats', 'recentNews', 'recentEvents', 'recentGallery'));
    }
}
