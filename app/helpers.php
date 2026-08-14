<?php

use App\Models\OwnerProfile;

if (!function_exists('default_wa_number')) {
    function default_wa_number(): string
    {
        return OwnerProfile::query()->value('whatsapp') ?: '6281234567890';
    }
}
