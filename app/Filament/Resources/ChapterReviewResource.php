<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChapterReviewResource\Pages;
use App\Filament\Resources\ChapterReviewResource\RelationManagers;
use App\Models\Chapter;
use App\Models\ChapterReview;
use App\Models\Story;
use App\Models\StoryReview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChapterReviewResource extends Resource
{
    protected static ?string $model = ChapterReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
		            Forms\Components\Select::make('story_id')
				            ->label('Truyện')
				            ->searchable()
				            ->required()
				            ->relationship('story', 'title')
				            ->preload()
				            ->reactive()
				            ->afterStateUpdated(fn (callable $set) => $set('chapter_id', null)),

		            Forms\Components\Select::make('chapter_id')
				            ->label('Chap')
				            ->searchable()
				            ->options(function (callable $get) {
					            $storyId = $get('story_id');
					            if ($storyId) {
						            return Chapter::where('story_id', $storyId)
								            ->get()
								            ->mapWithKeys(function ($chapter) {
									            $label = "Chap " . $chapter->chapter_number;
									            if (!empty($chapter->title)) {
										            $label .= ': ' . $chapter->title;
									            }
									            return [$chapter->id => $label];
								            })
								            ->toArray();
					            }
					            return [];
				            })
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
				            ->sortable()
				            ->formatStateUsing(fn ($state, $record) => $record->story ? $record->story->title : 'N/A'),
		            Tables\Columns\TextColumn::make('chapter.chapter_number')
				            ->label('Chap')
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
						            Forms\Components\Hidden::make('chapter_id')
                                            ->default(
													fn ($record) => $record->chapter_id
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
											ChapterReview::create($data);

											Notification::make()
													->title('Trả lời thành công')
													->success()
													->send();
										} else {
											Notification::make()
													->title('Không thể trả lời vì không có nội dung')
													->danger()
													->send();
										}
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
            'index' => Pages\ListChapterReviews::route('/'),
            'create' => Pages\CreateChapterReview::route('/create'),
            'edit' => Pages\EditChapterReview::route('/{record}/edit'),
        ];
    }

	public static function getLabel(): string
	{
		return 'Đánh giá Chap';
	}

	public static function getPluralLabel(): string
	{
		return 'Danh sách đánh giá Chap';
	}

	public static function getNavigationLabel(): string
	{
		return 'Đánh giá Chap';
	}
}
