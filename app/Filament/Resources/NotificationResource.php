<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NotificationResource\Pages;
use App\Filament\Resources\NotificationResource\RelationManagers;
use App\Models\Notification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NotificationResource extends Resource
{
    protected static ?string $model = Notification::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
					->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('notifiable_type')
					->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('notifiable_id')
					->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('data')
					->searchable()
					->sortable(),
				Tables\Columns\TextColumn::make('read_at')
					->searchable()
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNotifications::route('/'),
            'create' => Pages\CreateNotification::route('/create'),
            'edit' => Pages\EditNotification::route('/{record}/edit'),
        ];
    }

	public static function getLabel(): string
	{
		return 'Thông báo';
	}

	public static function getPluralLabel(): string
	{
		return 'Danh sách thông báo';
	}

	public static function getNavigationLabel(): string
	{
		return 'Thông báo';
	}
}
