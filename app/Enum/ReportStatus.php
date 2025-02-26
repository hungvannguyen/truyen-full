<?php

namespace App\Enum;

use Filament\Support\Contracts\HasLabel;

enum ReportStatus: string implements HasLabel
{
	case PENDING = 'pending';
	case RESOLVED = 'resolved';
	case REJECTED = 'rejected';

	public function getLabel(): ?string
	{
		return match ($this) {
			self::PENDING => 'Chờ xử lý',
			self::RESOLVED => 'Đã xử lý',
			self::REJECTED => 'Từ chối',
		};
	}
}
