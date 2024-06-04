<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Traits\DeleteFileTrait;
use App\Traits\LargeBannerImage;
use App\Traits\SmallBannerImage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use LargeBannerImage;
    use SmallBannerImage;
    use DeleteFileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::first();
        return view('admins.banners.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_title' => 'required|string|max:50',
            'second_title' => 'required|string|max:50',
            'third_title' => 'required|string|max:50',
            'first_image' => 'required|image|mimes:jpeg,jpg,png,webp,gif|max:3000',
            'second_image' => 'required|image|mimes:jpeg,jpg,png,webp,gif|max:3000',
            'third_image' => 'required|image|mimes:jpeg,jpg,png,webp,gif|max:3000',
        ]);

        $first_image = $this->uploadFile($request->first_image);
        $second_image = $this->uploadFile($request->second_image);
        $third_image = $this->upload($request->third_image);

        Banner::create([
            'first_title' => $request->first_title,
            'second_title' => $request->second_title,
            'third_title' => $request->third_title,
            'first_image' => $first_image,
            'second_image' => $second_image,
            'third_image' => $third_image,
        ]);

        flash()->option('position', 'bottom-right')->success('banner created successfully');
        return redirect()->route('banner');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $banner = Banner::first();
        return view('admins.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_title' => 'required|string|max:50',
            'second_title' => 'required|string|max:50',
            'third_title' => 'required|string|max:50',
            'first_image' => 'image|mimes:jpeg,jpg,png,webp,gif|max:3000',
            'second_image' => 'image|mimes:jpeg,jpg,png,webp,gif|max:3000',
            'third_image' => 'image|mimes:jpeg,jpg,png,webp,gif|max:3000',
        ]);

        $first_image = $request->old_first_image;
        $second_image = $request->old_second_image;
        $third_image = $request->old_third_image;

        if($request->hasFile('first_image')){
            $first_image = $this->uploadFile($request->first_image);
        }

        if($request->hasFile('second_image')){
            $second_image = $this->uploadFile($request->second_image);
        }

        if($request->hasFile('third_image')){
            $third_image = $this->upload($request->third_image);
        }

        Banner::findOrFail($id)->update([
            'first_title' => $request->first_title,
            'second_title' => $request->second_title,
            'third_title' => $request->third_title,
            'first_image' => $first_image,
            'second_image' => $second_image,
            'third_image' => $third_image,
        ]);

        flash()->option('position', 'bottom-right')->success('banner updated successfully');
        return redirect()->route('banner');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
