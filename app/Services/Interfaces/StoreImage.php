<?php

namespace App\Services\Interfaces;

use App\Models\EloquentModels\News;
use Illuminate\Http\Request;

interface StoreImage
{
    public function StoreImage(Request $request, News $news, string $requestField): string;

}
