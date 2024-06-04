<?php

namespace App\Traits;
use Intervention\Image\Laravel\Facades\Image;
trait LargeBannerImage
{
    public function upload($file)
    {
        $file_name = 'uploads/banners/' . time() . rand(1, 100) . '.' . $file->extension();
        $image = Image::read($file)->resize(1310, 940);
        $image = $image->toPng()->save(public_path($file_name));
        return $file_name;
    }
}
