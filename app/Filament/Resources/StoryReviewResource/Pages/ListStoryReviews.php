<?php

namespace App\Filament\Resources\StoryReviewResource\Pages;

use App\Filament\Resources\StoryReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStoryReviews extends ListRecords
{
    protected static string $resource = StoryReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
