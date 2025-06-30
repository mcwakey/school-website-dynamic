<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('uploader')->latest()->paginate(10);
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:forms,policies,newsletters,curriculum,reports,other',
            'file' => 'required|file|max:10240', // 10MB max
            'is_public' => 'boolean'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents', $fileName, 'public');

            Document::create([
                'title' => $request->title,
                'description' => $request->description,
                'file_path' => $filePath,
                'file_name' => $file->getClientOriginalName(),
                'file_type' => $file->getClientMimeType(),
                'file_size' => $file->getSize(),
                'category' => $request->category,
                'is_public' => $request->boolean('is_public'),
                'uploaded_by' => Auth::id()
            ]);

            return redirect()->route('admin.documents.index')->with('success', 'Document uploaded successfully!');
        }

        return back()->with('error', 'File upload failed!');
    }

    public function show(Document $document)
    {
        return view('admin.documents.show', compact('document'));
    }

    public function edit(Document $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:forms,policies,newsletters,curriculum,reports,other',
            'file' => 'nullable|file|max:10240',
            'is_public' => 'boolean'
        ]);

        $updateData = [
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'is_public' => $request->boolean('is_public')
        ];

        // Handle file replacement
        if ($request->hasFile('file')) {
            // Delete old file
            if ($document->file_path && Storage::disk('public')->exists($document->file_path)) {
                Storage::disk('public')->delete($document->file_path);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents', $fileName, 'public');

            $updateData = array_merge($updateData, [
                'file_path' => $filePath,
                'file_name' => $file->getClientOriginalName(),
                'file_type' => $file->getClientMimeType(),
                'file_size' => $file->getSize()
            ]);
        }

        $document->update($updateData);

        return redirect()->route('admin.documents.index')->with('success', 'Document updated successfully!');
    }

    public function destroy(Document $document)
    {
        // Delete file from storage
        if ($document->file_path && Storage::disk('public')->exists($document->file_path)) {
            Storage::disk('public')->delete($document->file_path);
        }

        $document->delete();

        return redirect()->route('admin.documents.index')->with('success', 'Document deleted successfully!');
    }

    public function download(Document $document)
    {
        if (!Storage::disk('public')->exists($document->file_path)) {
            abort(404, 'File not found');
        }

        // Increment download count
        $document->increment('download_count');

        return Storage::disk('public')->download($document->file_path, $document->file_name);
    }
}
