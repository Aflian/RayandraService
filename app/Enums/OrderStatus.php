<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'pending';
    case UnderReview = 'under_review';
    case InProgress = 'in_progress';
    case Revision = 'revision';
    case Completed = 'completed';
    case Cancelled = 'cancelled';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::UnderReview => 'Under Review',
            self::InProgress => 'In Progress',
            self::Revision => 'Revision',
            self::Completed => 'Completed',
            self::Cancelled => 'Cancelled',
        };
    }
}
