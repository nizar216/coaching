<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
trait HasImageUpload
{
    protected function handleImageUpload(Request $request, array &$validatedData): void
    {
        $image = $request->file('image');
        if (!$image || !$image->isValid()) {
            throw new BadRequestException('Invalid image');
        }
        $filename = $this->generateUniqueImageFilename($validatedData['name'], $image);
        $image->storePubliclyAs('public/players', $filename);
        $validatedData['image'] = $filename;
    }

    private function generateUniqueImageFilename(string $name, UploadedFile $image): string
    {
        return slugify($name) . '.' . $image->extension();
    }
}
