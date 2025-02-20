<?php

namespace App\Enum;

use Filament\Support\Contracts\HasLabel;

enum UserStatus: string implements hasLabel
{
    case ACTIVE = 'active';
	case INACTIVE = 'inactive';
	case RESTRICTED = 'restricted';

	public function getLabel(): ?string
	{
		return match ($this) {
			self::ACTIVE => 'Hoạt động',
			self::INACTIVE => 'Không hoạt động',
			self::RESTRICTED => 'Bị hạn chế',
		};
	}
}
