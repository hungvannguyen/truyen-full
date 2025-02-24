<?php

namespace App\Trait;

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
}
