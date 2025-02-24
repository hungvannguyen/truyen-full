<?php

namespace App\Filament\Resources\ChapterReviewResource\Pages;

use App\Filament\Resources\ChapterReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChapterReviews extends ListRecords
{
    protected static string $resource = ChapterReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
