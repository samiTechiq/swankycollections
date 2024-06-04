<?php

namespace App\Traits;
use Intervention\Image\Laravel\Facades\Image;
trait SliderImageHandler
{
    public function handle($file)
    {
        $file_name = 'uploads/sliders/' . $this->generateRandomString(5) . '.' . $file->extension();
        $image = Image::read($file)->resize(1920, 600);
        $image = $image->toPng()->save(public_path($file_name));
        return $file_name;
    }

    function generateRandomString(int $length): string
    {
        $bytes = random_bytes($length); // Generate cryptographally secure random bytes
        return bin2hex($bytes);         // Convert bytes to hexadecimal string
    }
}


