<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagResource\Pages;
use App\Filament\Resources\TagResource\RelationManagers;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
				Forms\Components\Select::make('tag_group_id')
                    ->label('Nhóm tag')
					->searchable()
	                ->relationship('tagGroup', 'name')
	                ->required(),
                Forms\Components\TextInput::make('name')
					->label('Tên tag')
	                ->maxLength(255)
					->required()
					->placeholder('Nhập tên tag')
					->afterStateUpdated(function ($state, callable $set) {
						$set('slug', Str::slug($state));
					}),
				Forms\Components\TextInput::make('slug')
					->label('Slug')
					->placeholder('Nhập slug tag'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
	                ->label('Tên tag')
					->searchable()
					->sortable(),
	            Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tagGroup.name')
                    ->label('Nhóm tag')
                    ->searchable()
                    ->sortable(),
	            Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
					->searchable()
					->sortable(),
	            Tables\Columns\TextColumn::make('updated_at')
					->label('Ngày cập nhật')
		            ->sortable()
                    ->searchable(),
            ])
            ->filters([
	            Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
				Tables\Actions\ViewAction::make()
	                ->label('Xem'),
                Tables\Actions\EditAction::make()
	                ->label('Sửa'),
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
                    Tables\Actions\DeleteBulkAction::make()
                            ->label('Xóa Tất Cả'),
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTags::route('/'),
            'create' => Pages\CreateTag::route('/create'),
            'edit' => Pages\EditTag::route('/{record}/edit'),
        ];
    }

	public static function getLabel(): string
	{
		return 'Tags';
	}

	public static function getPluralLabel(): string
	{
		return 'Danh sách Tag';
	}

	public static function getNavigationLabel(): string
	{
		return 'Tag';
	}
}
