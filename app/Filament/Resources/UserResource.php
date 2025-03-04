<?php

namespace App\Filament\Resources;

use App\Enum\UserRole;
use App\Enum\UserStatus;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use App\Trait\Image;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class UserResource extends Resource
{
	use Image;
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
	    return $form
            ->schema([
                Forms\Components\FileUpload::make('avatar')
                    ->label('Ảnh đại diện')
	                ->avatar()
	                ->disk('s3')
	                ->rules(['nullable', 'image', 'max:2024'])
	                ->directory('avatars')
	                ->getUploadedFileNameForStorageUsing(fn(TemporaryUploadedFile $file): string => (new UserResource)->generateImageName($file)),
	            Forms\Components\TextInput::make('name')
	                ->label('Tên người dùng')
		            ->maxLength(255)
	                ->required()
	                ->placeholder('Enter user name'),
	            Forms\Components\TextInput::make('email')
                    ->label('Email')
		            ->maxLength(255)
	                ->required()
	                ->email()
		            ->rules(function (callable $get, $record) {
			            return is_null($record) ? ['unique:users,email'] : [];
		            })
	                ->placeholder('Enter user email'),
	            Forms\Components\TextInput::make('password')
	                ->label('Mật khẩu')
		            ->maxLength(255)
		            ->required(fn (string $context): bool => $context === 'create')
		            ->password()
	                ->placeholder('Enter user password'),
	            Forms\Components\TextInput::make('password_confirmation')
			            ->label('Xác nhận mật khẩu')
			            ->maxLength(255)
			            ->password()
			            ->placeholder('Nhập lại mật khẩu')
			            ->dehydrated(false)
			            ->required(fn (string $context): bool => $context === 'create')
			            ->same('password'),

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
		                ->circular()
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
	            Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
	            Tables\Actions\ViewAction::make()
			            ->label('Xem'),
                Tables\Actions\EditAction::make()
	                ->label('Chỉnh sửa'),
				Tables\Actions\Action::make('promote')
	                ->label('Nâng quyền')
	                ->action(fn (User $user) => $user->update(['role' => UserRole::CONTRIBUTOR]))
					->requiresConfirmation()
	                ->visible(
		                fn (User $user) => $user->role === UserRole::USER
	                ),
				Tables\Actions\Action::make('demote')
	                ->label('Hạ quyền')
	                ->action(fn (User $user) => $user->update(['role' => UserRole::USER]))
					->requiresConfirmation()
	                ->visible(
		                fn (User $user) => $user->role === UserRole::CONTRIBUTOR
	                ),
				Tables\Actions\DeleteAction::make()
                    ->label('Xóa')
	                ->visible(fn (User $user) => $user->role !== UserRole::ADMIN),
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

	public static function getLabel(): string
	{
		return 'Người dùng';
	}

	public static function getPluralLabel(): string
	{
		return 'Danh sách người dùng';
	}

	public static function getNavigationLabel(): string
	{
		return 'Người dùng';
	}
}
