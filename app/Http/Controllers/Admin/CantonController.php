<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Canton;
use Illuminate\Http\Request;

class CantonController extends Controller
{
    public function index()
    {
        $cantons = Canton::orderBy('name')->get();
        return view('admin.cantons.index', compact('cantons'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'price_per_hour' => 'required|numeric|min:0|max:999',
        ]);

        $canton = Canton::findOrFail($id);
        $canton->update([
            'price_per_hour' => $request->price_per_hour
        ]);

        return redirect()->route('dashboard')
            ->with('canton_status', 'Canton price updated successfully!')
            ->with('show_cantons', true);
    }
    
    public function getPrices()
    {
        $cantons = Canton::all()->pluck('price_per_hour', 'name');
        return response()->json($cantons);
    }
}
