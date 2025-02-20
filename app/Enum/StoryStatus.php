<?php

namespace App\Enum;

use Filament\Support\Contracts\HasLabel;

enum StoryStatus: string implements HasLabel
{
	case DRAFT = 'draft';
	case PUBLISHED = 'published';

	public function getLabel(): ?string
	{
		return match ($this) {
			self::DRAFT => 'Bản nháp',
			self::PUBLISHED => 'Đã xuất bản',
		};
	}
}
