<?php

namespace App\Enums;

enum UserRole: string
{
    case CustomerDigital = 'customer_digital';
    case CustomerInvitation = 'customer_invitation';
    case Workspace = 'workspace';
    case Admin = 'admin';
    case SuperAdmin = 'super_admin';

    public function label(): string
    {
        return match ($this) {
            self::CustomerDigital => 'Customer Digital',
            self::CustomerInvitation => 'Customer Invitation',
            self::Workspace => 'Workspace',
            self::Admin => 'Admin',
            self::SuperAdmin => 'Super Admin',
        };
    }
}
