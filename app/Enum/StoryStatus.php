<?php

namespace App\Enum;

use Filament\Support\Contracts\HasLabel;

enum StoryStatus: string implements HasLabel
{
	case DRAFT = 'draft';
	case PENDING = 'pending';
	case PUBLISHED = 'published';
	case BAN = 'ban';

	public function getLabel(): ?string
	{
		return match ($this) {
			self::DRAFT => 'Bản nháp',
			self::PENDING => 'Đang chờ',
			self::PUBLISHED => 'Đã xuất bản',
			self::BAN => 'Bị cấm',
		};
	}
}
