<?php
namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class FileUploadService
{
    /**
     * Build the logical relative directory path.
     */
    public function directory(string $path): string
    {
        return 'images/' . trim($path, '/') . '/';
    }

    /**
     * Handle updating an image asset, removing the old one if needed.
     */
    public function editPhoto($photo, ?string $oldPhoto, string $path): ?string
    {
        $targetDirectory = $this->directory($path);

        // A brand new file was uploaded
        if (request()->hasFile('image')) {
            if ($oldPhoto) {
                $oldFilePath = public_path($targetDirectory . $oldPhoto);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
            return $this->getImagePost($photo, $targetDirectory);
        }

        // If the file type is selected but no file is chosen, Postman sends nothing. We treat the complete absence of the 'image' field or an explicit empty value as a deletion command.
        if (! request()->has('image') || blank($photo) || $photo === 'null') {
            if ($oldPhoto) {
                $oldFilePath = public_path($targetDirectory . $oldPhoto);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
            return null; // Successfully clears out the database column
        }

        // 3. Fallback default
        return $oldPhoto;
    }

    /**
     * Process, format, and save the incoming image.
     */
    public function getImagePost($imgs, string $directory): string
    {
        // Read the image source
        $image = Image::decode($imgs);

        // Safely extract the file extension
        $extension = $imgs->getClientOriginalExtension() ?: 'png';

        // Generate a clean, secure unique filename
        $filename = Str::random(20) . '.' . $extension;

        // assemble absolute paths
        $cleanedDirectory = trim($directory, '/');
        $destinationPath  = public_path($cleanedDirectory . '/' . $filename);

        // Ensure directory exists and save the processed image safely
        $this->makeDirectory(dirname($destinationPath));
        $image->save($destinationPath);

        return $filename;
    }

    /**
     * Create deep file systems recursively if they do not exist.
     */
    public function makeDirectory(string $absolutePath): void
    {
        if (! File::isDirectory($absolutePath)) {
            File::makeDirectory($absolutePath, 0755, true);
        }
    }
}
