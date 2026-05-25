<?php
namespace App\Services;

use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\File;

class FileUploadService
{
    public function directory(string $path): string
    {
        return 'images' . DIRECTORY_SEPARATOR . trim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }
    public function editPhoto($photo, ?string $oldPhoto, string $path): string
    {
        // If there's no new upload, keep the old photo name
        if (! $photo) {
            return $oldPhoto ?? '';
        }

        $targetDirectory = $this->directory($path);
        // Delete the old photo if it exists and is different from the new one
        if ($oldPhoto && $oldPhoto !== $photo) {
            $oldFilePath = public_path($targetDirectory . $oldPhoto);
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
        }
        return $this->getImagePost($photo, $targetDirectory);

    }
    public function getImagePost($imgs, string $directory): string
    {
        $img = uniqid('', true) . '.png';
        $this->makeDirectory(public_path($directory));
        Image::read($imgs)->save(public_path($directory) . $img);
        return $img;
    }
    public function makeDirectory(string $absolutePath): void
    {
        if(!File::isDirectory($absolutePath)){
            File::makeDirectory($absolutePath, 0755, true);
        }
    }
}
