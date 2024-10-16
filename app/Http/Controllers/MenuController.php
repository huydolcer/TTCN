<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = menu::all();
        return view('index', compact('menus'));
    }

    public function add(Request $request)
    {
        $menu = new menu();
        $menu->Name = $request->Name;
        $menu->save();
        return redirect('/');
    }


    public function destroy($id)
    {
        try {
            $menu = Menu::findOrFail($id);
            $menu->delete();
            return response()->json(['message' => 'Menu deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting menu.'], 500);
        }
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
        ]);
    
        $menu = Menu::findOrFail($id);
        $menu->Name = $request->input('Name');
        $menu->save();
    
        return redirect('/')->with('success', 'Menu updated successfully.');
    }
    public function showUpdateForm($id)
{
    $menu = Menu::findOrFail($id);
    return view('update', compact('menu'));
}


}
