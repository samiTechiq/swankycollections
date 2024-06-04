<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\DeleteFileTrait;
use App\Traits\SliderImageHandler;
use App\Traits\SliderMiniImageHandler;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use SliderImageHandler;
    use SliderMiniImageHandler;
    use DeleteFileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $sliders = Slider::all();
        return view('admins.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admins.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,gif,webp,jpeg|max:3000',
            'status' => 'required|integer|max:1',
        ]);

        $image = $this->handle($request->image);
        $mini_image = $this->upload($request->image);
        Slider::create([
            'image' => $image,
            'mini_image' => $mini_image,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'status' => $request->status,
        ]);
        flash()->option('position', 'bottom-right')->success('slider created successfully');
        return redirect()->route('slider');
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
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('admins.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image' => 'image|mimes:png,jpg,gif,webp,jpeg|max:3000',
            'status' => 'required|integer|max:1',
        ]);

        $image = $request->old_image;
        $mini_image = $request->old_mini_image;
       if($request->hasFile('image')){
            $image = $this->handle($request->image);
            $mini_image = $this->upload($request->image);
            $this->delete($request->old_image);
            $this->delete($request->old_mini_image);
       }
        Slider::findOrFail($id)->update([
            'image' => $image,
            'mini_image' => $mini_image,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'status' => $request->status,
        ]);
        flash()->option('position', 'bottom-right')->success('slider updated successfully');
        return redirect()->route('slider');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        $this->delete($slider->image);
        $this->delete($slider->mini_image);
        $slider->delete();
        return redirect()->route('slider');
    }
}
