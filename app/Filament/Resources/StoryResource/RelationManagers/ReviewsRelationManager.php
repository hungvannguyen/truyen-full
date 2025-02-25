<?php

namespace App\Filament\Resources\StoryResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewsRelationManager extends RelationManager
{
    protected static string $relationship = 'reviews';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
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
                Forms\Components\TextInput::make('content')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('content')
            ->columns([
				Tables\Columns\TextColumn::make('user.name')
	                ->label('Người dùng'),
				Tables\Columns\TextColumn::make('rating')
	                ->label('Đánh giá'),
                Tables\Columns\TextColumn::make('content')
	                ->label('Nội dung'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
