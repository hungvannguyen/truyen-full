<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoryReviewResource\Pages;
use App\Filament\Resources\StoryReviewResource\RelationManagers;
use App\Models\StoryReview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
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
				Forms\Components\Select::make('rating')
					->label('Đánh giá')
					->options([
						1 => '1 sao',
						2 => '2 sao',
						3 => '3 sao',
						4 => '4 sao',
						5 => '5 sao',
					])
					->default(1)
					->required(),
				Forms\Components\Textarea::make('content')
					->label('Nội dung'),
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
				Tables\Columns\TextColumn::make('rating')
	                ->label('Đánh giá')
					->badge()
                    ->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('content')
					->label('Nội dung')
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
	                ->label('Sửa'),
				Tables\Actions\Action::make('reply')
	                ->label('Trả lời')
	                ->form(
							[
								Forms\Components\Hidden::make('story_id')
									->default(
										fn ($record) => $record->story_id
									),
								Forms\Components\Select::make('user_id')
									->label('Người dùng')
									->searchable()
									->relationship('user', 'name')
									->preload()
									->required(),
								Forms\Components\Textarea::make('content')
									->label('Nội dung')
									->required(),
								Forms\Components\Hidden::make('parent_id')
									->default(
										fn ($record) => $record->id
									),
							]
	                )
	            ->action(
			            function ($record, array $data){
				            if (!empty($record->content)) {
					            StoryReview::create($data);

					            Notification::make()
							            ->title('Trả lời thành công')
							            ->success()
							            ->send();
				            } else
					            Notification::make()
							            ->title('Không thể trả lời vì không có nội dung')
							            ->danger()
							            ->send();
			            }
	            ),
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

	public static function getLabel(): string
	{
		return 'Đánh giá truyện';
	}

	public static function getPluralLabel(): string
	{
		return 'Danh sách đánh giá truyện';
	}

	public static function getNavigationLabel(): string
	{
		return 'Đánh giá truyện';
	}
}
