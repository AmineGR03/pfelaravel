<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; 

class AdminController extends Controller
{
    public function home()
    {
        return view('Admin.home');
    }
    
    public function products()
    {
        $menus = Menu::all()->map(function ($menu) {
            
            $menu['pic'] = str_replace('public/', '', $menu['pic']);
            return $menu;
        });
        return view('Admin.product', compact('menus')); 
    }

    public function create()
    {
        return view('Admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'categorie' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'info' => 'required|string',
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
        ]);
    
       
        $path = $request->file('pic')->store('public/images');
    
        
        $request->merge(['pic' => $path]);
    
        
        Menu::create($request->all());
    
        
        return redirect()->route('admin.products');
    }
    

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('Admin.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'categorie' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'info' => 'required|string',
            'pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($request->all());

        return redirect()->route('admin.home');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('admin.home');
    }
}
