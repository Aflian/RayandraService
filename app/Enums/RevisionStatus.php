<?php

namespace App\Enums;

enum RevisionStatus: string
{
    case Pending = 'pending';
    case InRevision = 'in_revision';
    case Resolved = 'resolved';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::InRevision => 'In Revision',
            self::Resolved => 'Resolved',
        };
    }
}
