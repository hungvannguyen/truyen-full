<?php

namespace App\Filament\Resources;

use App\Enum\StoryStatus;
use App\Filament\Resources\StoryResource\Pages;
use App\Filament\Resources\StoryResource\RelationManagers;
use App\Models\Story;
use App\Models\TagGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

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
					->maxLength(255)
					->required()
					->placeholder('Enter story title')
					->afterStateUpdated(function ($state, callable $set) {
							$set('slug', Str::slug($state));
						}),
				Forms\Components\TextInput::make('slug')
					->label('Slug')
					->placeholder('Enter story slug'),
	            Forms\Components\Select::make('tag')
	                 ->label('Tag truyện')
	                 ->multiple()
		             ->relationship('tags', 'name')
	                 ->options(
	                     TagGroup::all()
	                         ->mapWithKeys(function ($tagGroup) {
	                             return [
	                                 $tagGroup->name => $tagGroup->tags->pluck('name', 'id')->toArray(),
	                             ];
	                         })
	                 )
		            ->preload(),
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
					->label('Ảnh bìa')
	                ->disk('s3'),
				Tables\Columns\TextColumn::make('title')
					->label('Tên truyện')
					->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('description')
					->label('Mô tả truyện')
					->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('chapter_count')
					->label('Số chương')
					->badge()
					->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('rating')
					->label('Đánh giá')
					->badge()
					->sortable(),
				Tables\Columns\TextColumn::make('rating_count')
					->label('Số lượt đánh giá')
					->badge()
					->sortable(),
				Tables\Columns\TextColumn::make('view_count')
					->label('Lượt xem')
					->badge()
					->sortable(),
				Tables\Columns\TextColumn::make('status')
					->label('Trạng thái truyện')
					->badge()
					->sortable(),
	            Tables\Columns\TextColumn::make('created_at')
		            ->label('Ngày tạo')
		            ->sortable(),
				Tables\Columns\TextColumn::make('updated_at')
                    ->label('Ngày cập nhật')
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
            RelationManagers\UsersRelationManager::class,
	        RelationManagers\ChaptersRelationManager::class,
	        RelationManagers\ReviewsRelationManager::class,
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

	public static function getLabel(): string
	{
		return 'Truyện';
	}

	public static function getPluralLabel(): string
	{
		return 'Danh sách truyện';
	}

	public static function getNavigationLabel(): string
	{
		return 'Truyện';
	}
}
