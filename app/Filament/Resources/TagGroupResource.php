<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagGroupResource\Pages;
use App\Filament\Resources\TagGroupResource\RelationManagers;
use App\Models\TagGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class TagGroupResource extends Resource
{
    protected static ?string $model = TagGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
				Forms\Components\TextInput::make('name')
                    ->label('Tên nhóm tag')
					->maxLength(255)
                    ->required()
                    ->placeholder('Enter the name of the tag group')
					->afterStateUpdated(function ($state, callable $set) {
						$set('slug', Str::slug($state));
					}),
	            Forms\Components\TextInput::make('slug')
					->label('Slug')
					->placeholder('Enter the slug of the tag group'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
	                ->label('Tên nhóm tag')
					->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('slug')
					->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('tag_count')
					->label('Số lượng tag')
					->searchable()
					->sortable(),
	            Tables\Columns\TextColumn::make('created_at')
		            ->label('Ngày tạo')
                    ->searchable()
                    ->sortable(),
	            Tables\Columns\TextColumn::make('updated_at')
                    ->label('Ngày cập nhật')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
				Tables\Actions\ViewAction::make()
					->label('Xem'),
                Tables\Actions\EditAction::make()
	                ->label('Chỉnh sửa'),
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
            RelationManagers\TagsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTagGroups::route('/'),
            'create' => Pages\CreateTagGroup::route('/create'),
            'edit' => Pages\EditTagGroup::route('/{record}/edit'),
        ];
    }
}
