<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;
use Symfony\Component\Mime\MimeTypes;

class GlbFileRule implements Rule
{
    public function passes($attribute, $value)
    {
        if (!$value instanceof UploadedFile) {
            return false;
        }

        $mimeTypes = new MimeTypes();
        $mimeType = $mimeTypes->guessMimeType($value->getPathname());
        $extension = $value->getClientOriginalExtension();

        // Log the MIME type and extension
        \Log::info("MIME type: {$mimeType}, Extension: {$extension}");

        return $mimeType === 'model/gltf-binary' && $extension === 'glb';
    }

    public function message()
    {
        return 'The uploaded file must be a .glb file.';
    }
}
