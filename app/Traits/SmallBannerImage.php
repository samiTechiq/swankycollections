<?php

namespace App\Traits;
use Intervention\Image\Laravel\Facades\Image;
trait SmallBannerImage
{
    public function uploadFile($file)
    {
        $file_name = 'uploads/banners/' . time() . rand(1, 100) . '.' . $file->extension();
        $image = Image::read($file)->resize(920, 448);
        $image = $image->toPng()->save(public_path($file_name));
        return $file_name;
    }
}
