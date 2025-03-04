<?php

namespace App\Trait;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait Image
{
    //
	public function generateImageName($image): string
	{
		$year = date('Y');
		$month = date('m');
		$day = date('d');

		$extension = $image->getClientOriginalExtension();

		$fileName = strtolower(Str::random(20)) . '-' . time() . '.' . $extension;

		return "{$year}/{$month}/{$day}/{$fileName}";
	}

	public function uploadImage($image, ?string $path = '' ): string
	{
		$imageName = $this->generateImageName($image);

		Storage::disk('s3')->put($path . $imageName, file_get_contents($image));

		return $imageName;
	}
}
