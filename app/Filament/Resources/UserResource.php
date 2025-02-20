<?php

namespace App\Filament\Resources;

use App\Enum\UserRole;
use App\Enum\UserStatus;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('avatar')
	                ->disk('s3')
	                ->getUploadedFileNameForStorageUsing(
				                fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
						                ->prepend('custom-prefix-'),
		                )
	                ->visibility('private'),
	            Forms\Components\TextInput::make('name')
	                ->label('Tên người dùng')
	                ->required()
	                ->placeholder('Enter user name'),
	            Forms\Components\TextInput::make('email')
                    ->label('Email')
	                ->required()
	                ->email()
		            ->rules(function (callable $get, $record) {
			            return is_null($record) ? ['unique:users,email'] : [];
		            })
	                ->placeholder('Enter user email'),
	            Forms\Components\TextInput::make('password')
	                ->label('Mật khẩu')
	                ->required()
	                ->password()
	                ->placeholder('Enter user password'),
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
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                        ->label('Ảnh đại diện')
	                    ->disk('s3'),
                Tables\Columns\TextColumn::make('name')
						->label('Tên người dùng')
						->searchable()
						->sortable(),
                Tables\Columns\TextColumn::make('email')
                        ->label('Email')
                        ->searchable()
                        ->sortable(),
                Tables\Columns\TextColumn::make('status')
		                ->badge()
                        ->label('Trạng thái')
                        ->sortable(),
                Tables\Columns\TextColumn::make('role')
		                ->badge()
                        ->label('Vai trò')
                        ->sortable(),
	            Tables\Columns\TextColumn::make('created_at')
			            ->label('Ngày tạo')
			            ->sortable(),
	            Tables\Columns\TextColumn::make('updated_at')
			            ->label('Ngày cập nhật')
			            ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
	                ->label('Chỉnh sửa'),
				Tables\Actions\DeleteAction::make()
                    ->label('Xóa'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
	                    ->label('Xóa Tất Cả'),
                ])
	            ->label('Hành động'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
