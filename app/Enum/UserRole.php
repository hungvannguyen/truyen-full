<?php

namespace App\Enum;

use Filament\Support\Contracts\HasLabel;

enum UserRole:string implements HasLabel
{
    case ADMIN = 'admin';
	case USER = 'user';
	case CONTRIBUTOR = 'contributor';

	public function getLabel(): ?string
	{
		return match ($this) {
			self::ADMIN => 'Quản trị viên',
			self::USER => 'Người dùng',
			self::CONTRIBUTOR => 'Người đóng góp',
		};
	}
}
