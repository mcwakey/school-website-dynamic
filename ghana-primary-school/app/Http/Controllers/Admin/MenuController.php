<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomMenu;

class MenuController extends Controller
{
    public function index()
    {
        $headerMenus = CustomMenu::forLocation('header')->parents()->ordered()->with('children')->get();
        $footerMenus = CustomMenu::forLocation('footer')->parents()->ordered()->with('children')->get();

        return view('admin.menus.index', compact('headerMenus', 'footerMenus'));
    }

    public function create()
    {
        $locations = ['header', 'footer'];
        $parentMenus = CustomMenu::parents()->ordered()->get();

        return view('admin.menus.create', compact('locations', 'parentMenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|in:header,footer',
            'name' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'target' => 'required|in:_self,_blank',
            'icon' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:custom_menus,id',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        CustomMenu::create($data);

        return redirect()->route('admin.menus.index')
                        ->with('success', 'Menu item created successfully!');
    }

    public function show(CustomMenu $menu)
    {
        return view('admin.menus.show', compact('menu'));
    }

    public function edit(CustomMenu $menu)
    {
        $locations = ['header', 'footer'];
        $parentMenus = CustomMenu::parents()->where('id', '!=', $menu->id)->ordered()->get();

        return view('admin.menus.edit', compact('menu', 'locations', 'parentMenus'));
    }

    public function update(Request $request, CustomMenu $menu)
    {
        $request->validate([
            'location' => 'required|in:header,footer',
            'name' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'target' => 'required|in:_self,_blank',
            'icon' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:custom_menus,id',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $menu->update($data);

        return redirect()->route('admin.menus.index')
                        ->with('success', 'Menu item updated successfully!');
    }

    public function destroy(CustomMenu $menu)
    {
        // Delete children if any
        $menu->children()->delete();

        $menu->delete();

        return redirect()->route('admin.menus.index')
                        ->with('success', 'Menu item deleted successfully!');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:custom_menus,id',
            'items.*.sort_order' => 'required|integer'
        ]);

        foreach ($request->items as $item) {
            CustomMenu::where('id', $item['id'])->update(['sort_order' => $item['sort_order']]);
        }

        return response()->json(['success' => true]);
    }
}
