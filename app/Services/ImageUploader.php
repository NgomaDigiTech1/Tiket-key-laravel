<?php
declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait ImageUploader
{
    public static function uploadFiles(Request $request): string
    {
        return $request->file('picture')
            ->storePublicly('/', ['disk' => 'public']);
    }

    public function removePathOfImages($model)
    {
        Storage::disk('public')
            ->delete($model->picture);
    }

    public function unsetFilesUploads($model)
    {
        Storage::disk('public')->delete($model->picture);
    }
}
