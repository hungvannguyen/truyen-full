<?php

namespace App\Filament\Resources;

use App\Enum\ReportStatus;
use App\Filament\Resources\ReportResource\Pages;
use App\Filament\Resources\ReportResource\RelationManagers;
use App\Models\Chapter;
use App\Models\Report;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
				Forms\Components\Select::make('user_id')
	                ->label('Người báo cáo')
	                ->relationship('user', 'name')
					->searchable()
					->preload()
	                ->required(),
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
                Forms\Components\Select::make('reason')
					->label('Lý do')
					->options([
						'Spam' => 'Spam',
						'Nội dung không phù hợp' => 'Nội dung không phù hợp',
						'Bản quyền' => 'Bản quyền',
						'Khác' => 'Khác',
					])
					->required(),
				Forms\Components\Select::make('status')
					->label('Trạng thái')
					->options([
							collect(ReportStatus::cases())
									->mapWithKeys(fn($status) => [$status->value => $status->getLabel()])
									->toArray()
					])
					->default(ReportStatus::PENDING->value)
					->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
				Tables\Columns\TextColumn::make('user.name')
					->label('Người báo cáo'),
				Tables\Columns\TextColumn::make('story.title')
					->label('Truyện'),
				Tables\Columns\TextColumn::make('chapter.chapter_number')
					->label('Chap'),
				Tables\Columns\TextColumn::make('reason')
					->label('Lý do'),
				Tables\Columns\TextColumn::make('status')
					->label('Trạng thái')
	                ->badge(),
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
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }

	public static function getLabel(): string
	{
		return 'Báo cáo';
	}

	public static function getPluralLabel(): string
	{
		return 'Danh sách báo cáo';
	}

	public static function getNavigationLabel(): string
	{
		return 'Báo cáo';
	}
}
