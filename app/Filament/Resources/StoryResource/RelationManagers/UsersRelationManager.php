<?php

namespace App\Filament\Resources\StoryResource\RelationManagers;

use App\Enum\UserRole;
use App\Enum\UserStatus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
	            Forms\Components\FileUpload::make('avatar')
		            ->avatar()
		            ->image()
		            ->rules(['nullable', 'image', 'max:1024'])
		            ->disk('s3'),
				Forms\Components\TextInput::make('name')
					->required()
					->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->required()
                    ->password(),
	            Forms\Components\Select::make('status')
		            ->label('Trạng thái người dùng')
		            ->required()
		            ->options(
				            collect(UserStatus::cases())
						            ->mapWithKeys(fn($status) => [$status->value => $status->getLabel()])
						            ->toArray()
		            )
		            ->default(UserStatus::ACTIVE->value),
	            Forms\Components\Select::make('role')
		            ->label('Vai trò người dùng')
		            ->required()
		            ->options(
				            collect(UserRole::cases())
						            ->mapWithKeys(fn($role) => [$role->value => $role->getLabel()])
						            ->toArray()
		            )
		            ->default(UserRole::USER->value),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('email')
            ->columns([
                Tables\Columns\TextColumn::make('email'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
	                ->label('Tạo người dùng'),
	            Tables\Actions\AttachAction::make()
	                ->label('Thêm người dùng'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
	                ->label('Xem'),
                Tables\Actions\DetachAction::make()
	                ->label('Xóa'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make()
	                ->label('Xóa Tất Cả'),
                ])->label('Hành động'),
            ]);
    }
}
