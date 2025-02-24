<?php

namespace App\Filament\Resources\TagGroupResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class TagsRelationManager extends RelationManager
{
    protected static string $relationship = 'tags';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('name')
	                ->label('Tên Tag')
	                ->searchable()
                    ->required()
	                ->afterStateUpdated(function ($state, callable $set) {
		                $set('slug', Str::slug($state));
	                }),
	            Forms\Components\TextInput::make('slug')
		            ->label('Slug')
		            ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
	                ->label('Tạo mới Tag'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
	                ->label('Chỉnh sửa'),
                Tables\Actions\DeleteAction::make()
	                ->label('Xoá'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
