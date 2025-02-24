<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoryReviewResource\Pages;
use App\Filament\Resources\StoryReviewResource\RelationManagers;
use App\Models\StoryReview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StoryReviewResource extends Resource
{
    protected static ?string $model = StoryReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('story_id')
					->label('Truyện')
	                ->searchable()
					->relationship('story', 'title')
					->required()
					->preload(),
				Forms\Components\Select::make('user_id')
					->label('Người dùng')
	                ->searchable()
					->relationship('user', 'name')
					->required()
					->preload(),
				Forms\Components\Textarea::make('content')
					->label('Nội dung')
					->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('story.title')
					->label('Truyện')
					->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('user.name')
					->label('Người dùng')
					->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('content')
					->label('Nội dung')
					->searchable()
					->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStoryReviews::route('/'),
            'create' => Pages\CreateStoryReview::route('/create'),
            'edit' => Pages\EditStoryReview::route('/{record}/edit'),
        ];
    }
}
