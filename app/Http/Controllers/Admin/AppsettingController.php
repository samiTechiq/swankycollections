<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AppsettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = AppSetting::first();
        return view('admins.settings.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admins.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'app_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'tagline' => 'required',
            'app_url' => 'required',
        ]);

        AppSetting::create($request->all());
        flash()->option('position', 'bottom-center')->success('settings updated successfully');
        return redirect()->route('setting');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $setting = AppSetting::findOrFail($id);
        return view('admins.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'app_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'tagline' => 'required',
            'app_url' => 'required',
        ]);

        AppSetting::findOrFail($id)->update($request->all());
        flash()->option('position', 'bottom-center')->success('settings updated successfully');
        return redirect()->route('setting');
    }

}
