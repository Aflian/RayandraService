<?php

namespace App\Enums;

enum OrderFileType: string
{
    case CustomerUpload = 'customer_upload';
    case Deliverable = 'deliverable';

    public function label(): string
    {
        return match ($this) {
            self::CustomerUpload => 'Customer Upload',
            self::Deliverable => 'Deliverable',
        };
    }
}
