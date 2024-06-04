<?php

namespace App\Traits;
use Intervention\Image\Laravel\Facades\Image;
trait SliderMiniImageHandler
{
    public function upload($file)
    {
        $file_name = 'uploads/sliders/' . time() . rand(1, 100) . '.' . $file->extension();
        $image = Image::read($file)->resize(768, 460);
        $image = $image->toPng()->save(public_path($file_name));
        return $file_name;
    }
}
