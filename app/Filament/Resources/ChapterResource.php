<?php

namespace App\Filament\Resources;

use App\Enum\StoryStatus;
use App\Filament\Resources\ChapterResource\Pages;
use App\Filament\Resources\ChapterResource\RelationManagers;
use App\Models\Chapter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ChapterResource extends Resource
{
    protected static ?string $model = Chapter::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
				Forms\Components\Select::make('story_id')
					->label('Truyện')
					->searchable()
                    ->relationship('story', 'title'),
                Forms\Components\TextInput::make('title')
					->label('Tên chương')
					->maxLength(255)
	                ->afterStateUpdated(function ($state, callable $set) {
		                $set('slug', Str::slug($state));
	                })
					->placeholder('Nhập tên chương'),
				Forms\Components\TextInput::make('slug')
                    ->label('Slug'),
				Forms\Components\RichEditor::make('content')
					->label('Nội dung chương')
					->required(),
	            Forms\Components\Select::make('status')
		            ->label('Trạng thái chương')
		            ->required()
		            ->options([
			            collect(StoryStatus::cases())
					            ->mapWithKeys(fn($status) => [$status->value => $status->getLabel()])
					            ->toArray()
	            ])
		            ->default('draft'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
				Tables\Columns\TextColumn::make('story.title')
	                ->label('Tên truyện')
	                ->searchable()
					->sortable(),
	            Tables\Columns\TextColumn::make('chapter_number')
		            ->label('Số chương')
		            ->badge()
		            ->searchable()
		            ->sortable(),
                Tables\Columns\TextColumn::make('title')
					->label('Tên chương')
					->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('slug')
					->label('Slug')
					->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('status')
					->label('Trạng thái')
					->badge()
					->searchable()
					->sortable(),
            ])
            ->filters([
	            Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
	            Tables\Actions\ViewAction::make()
			            ->label('Xem'),
	            Tables\Actions\EditAction::make()
			            ->label('Chỉnh sửa'),
	            Tables\Actions\DeleteAction::make()
			            ->label('Xóa'),
	            Tables\Actions\RestoreAction::make()
			            ->label('Khôi phục'),
	            Tables\Actions\ForceDeleteAction::make()
			            ->label('Xóa Vĩnh Viễn')
			            ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
	                Tables\Actions\ForceDeleteBulkAction::make()
			                ->label('Xóa Vĩnh Viễn')
			                ->requiresConfirmation(),
	                Tables\Actions\RestoreBulkAction::make()
			                ->label('Khôi Phục'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ReviewsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChapters::route('/'),
            'create' => Pages\CreateChapter::route('/create'),
            'edit' => Pages\EditChapter::route('/{record}/edit'),
        ];
    }
}
