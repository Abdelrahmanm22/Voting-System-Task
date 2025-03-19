<?php

namespace App\Traits;

trait AttachmentTrait
{
    function saveAttachment($file,$folderPath)
    {
        $originalName = $file->getClientOriginalName();
        $file->move(public_path($folderPath), $originalName);
        return $originalName;
    }
}
