<?php

namespace App\Services;

use App\Models\EloquentModels\News;
use App\Services\Interfaces\StoreImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreImageService implements StoreImage
{

    public function getUploadedFileName(Request $request, string $requestField): string
    {
        $originName = $request->file($requestField)->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file($requestField)->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;

        return $fileName;
    }

    public function StoreImage(Request $request, News $news, string $requestField): string
    {

        $url = '';

        if($request->hasFile($requestField)) {

            $request->validate([
                'image' => ['sometimes', 'image', 'mimes:jpeg, bmp, png|max:1500']
            ]);
//-----------------------
            /*$originName = $request->file($requestField)->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file($requestField)->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;*/

//----------------------
            $oldPath = str_replace('storage', 'public', $news->image);
            Storage::delete($oldPath);

            $path = Storage::putFileAs('public/img/photo', $request->file('image'),
                $this->getUploadedFileName($request, $requestField));
            $url = Storage::url($path);
        }
        return $url;
    }

}
