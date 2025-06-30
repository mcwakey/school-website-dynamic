<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoreValue;
use Illuminate\Http\Request;

class CoreValueController extends Controller
{
    public function index()
    {
        $coreValues = CoreValue::ordered()->get();
        return view('admin.core-values.index', compact('coreValues'));
    }

    public function create()
    {
        return view('admin.core-values.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'color' => 'nullable|string|max:7',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        CoreValue::create($request->all());

        return redirect()->route('admin.core-values.index')
            ->with('success', 'Core value created successfully.');
    }

    public function show(CoreValue $coreValue)
    {
        return view('admin.core-values.show', compact('coreValue'));
    }

    public function edit(CoreValue $coreValue)
    {
        return view('admin.core-values.edit', compact('coreValue'));
    }

    public function update(Request $request, CoreValue $coreValue)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'color' => 'nullable|string|max:7',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $coreValue->update($request->all());

        return redirect()->route('admin.core-values.index')
            ->with('success', 'Core value updated successfully.');
    }

    public function destroy(CoreValue $coreValue)
    {
        $coreValue->delete();

        return redirect()->route('admin.core-values.index')
            ->with('success', 'Core value deleted successfully.');
    }
}
