<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageContent;

class PageContentController extends Controller
{
    public function index()
    {
        $contents = PageContent::with([])
                              ->orderBy('page')
                              ->orderBy('section')
                              ->orderBy('sort_order')
                              ->paginate(20);

        $pages = PageContent::distinct()->pluck('page');
        $sections = PageContent::distinct()->pluck('section');

        return view('admin.page-contents.index', compact('contents', 'pages', 'sections'));
    }

    public function create()
    {
        $pages = ['home', 'about', 'contact', 'news', 'events', 'gallery', 'staff', 'academics'];
        $sections = ['hero', 'welcome', 'mission', 'vision', 'features', 'testimonials', 'footer'];

        return view('admin.page-contents.create', compact('pages', 'sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'page' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'key' => 'required|string|max:255|unique:page_contents',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'metadata' => 'nullable|json',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Parse JSON metadata if provided
        if ($request->has('metadata') && $request->metadata) {
            $data['metadata'] = json_decode($request->metadata, true);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('page-contents', 'public');
        }

        PageContent::create($data);

        return redirect()->route('admin.page-contents.index')
                        ->with('success', 'Page content created successfully!');
    }

    public function show(PageContent $pageContent)
    {
        return view('admin.page-contents.show', compact('pageContent'));
    }

    public function edit(PageContent $pageContent)
    {
        $pages = ['home', 'about', 'contact', 'news', 'events', 'gallery', 'staff', 'academics'];
        $sections = ['hero', 'welcome', 'mission', 'vision', 'features', 'testimonials', 'footer'];

        return view('admin.page-contents.edit', compact('pageContent', 'pages', 'sections'));
    }

    public function update(Request $request, PageContent $pageContent)
    {
        $request->validate([
            'page' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'key' => 'required|string|max:255|unique:page_contents,key,' . $pageContent->id,
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'metadata' => 'nullable|json',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Parse JSON metadata if provided
        if ($request->has('metadata') && $request->metadata) {
            $data['metadata'] = json_decode($request->metadata, true);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($pageContent->image && \Storage::disk('public')->exists($pageContent->image)) {
                \Storage::disk('public')->delete($pageContent->image);
            }
            $data['image'] = $request->file('image')->store('page-contents', 'public');
        }

        $pageContent->update($data);

        return redirect()->route('admin.page-contents.index')
                        ->with('success', 'Page content updated successfully!');
    }

    public function destroy(PageContent $pageContent)
    {
        // Delete image if exists
        if ($pageContent->image && \Storage::disk('public')->exists($pageContent->image)) {
            \Storage::disk('public')->delete($pageContent->image);
        }

        $pageContent->delete();

        return redirect()->route('admin.page-contents.index')
                        ->with('success', 'Page content deleted successfully!');
    }
}
