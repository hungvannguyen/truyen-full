<?php

namespace App\Filament\Resources\ChapterReviewResource\Pages;

use App\Filament\Resources\ChapterReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChapterReview extends EditRecord
{
    protected static string $resource = ChapterReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
