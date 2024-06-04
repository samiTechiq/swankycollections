<?php

namespace App\Traits;

trait DeleteFileTrait
{
    public function delete($file){
        if(!empty($file) && file_exists(public_path($file))){
            unlink($file);
        }
        return true;
    }
}
