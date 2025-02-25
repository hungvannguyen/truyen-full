<?php

namespace App\Facades;

use App\Services\RatingService;
use Illuminate\Support\Facades\Facade;

class Rating extends Facade
{
	protected static function getFacadeAccessor()
	{
		return RatingService::class;
	}
}
