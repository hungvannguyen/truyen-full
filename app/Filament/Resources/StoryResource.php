<?php

namespace App\Filament\Resources;

use App\Enum\StoryStatus;
use App\Filament\Resources\StoryResource\Pages;
use App\Filament\Resources\StoryResource\RelationManagers;
use App\Models\Story;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StoryResource extends Resource
{
    protected static ?string $model = Story::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('cover_image')
	                ->label('Ảnh bìa')
					->image()
					->rules(['nullable', 'image', 'max:1024'])
					->disk('s3'),
				Forms\Components\TextInput::make('title')
					->label('Tên truyện')
					->required()
					->placeholder('Enter story title'),
				Forms\Components\Textarea::make('description')
					->label('Mô tả truyện')
					->placeholder('Enter story description'),
	            Forms\Components\Select::make('status')
		            ->label('Trạng thái truyện')
		            ->required()
		            ->options([
			            collect(StoryStatus::cases())
					            ->mapWithKeys(fn($status) => [$status->value => $status->getLabel()])
					            ->toArray()
		            ])
		            ->default(StoryStatus::DRAFT->value),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
					->label('Ảnh bìa'),
				Tables\Columns\TextColumn::make('title')
					->label('Tên truyện')
					->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('description')
					->label('Mô tả truyện')
					->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('status')
					->label('Trạng thái truyện')
					->sortable(),
	            Tables\Columns\TextColumn::make('created_at')
		            ->label('Ngày tạo')
		            ->sortable(),
				Tables\Columns\TextColumn::make('updated_at')
                    ->label('Ngày cập nhật')
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
            RelationManagers\UsersRelationManager::class,
	        RelationManagers\ChaptersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStories::route('/'),
            'create' => Pages\CreateStory::route('/create'),
            'edit' => Pages\EditStory::route('/{record}/edit'),
        ];
    }
}
