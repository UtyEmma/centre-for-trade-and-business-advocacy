<?php

namespace App\Filament\Resources\TeamMembers\Pages;

use App\Filament\Resources\Support\Pages\CmsEditRecord;
use App\Filament\Resources\TeamMembers\TeamMemberResource;

class EditTeamMember extends CmsEditRecord
{
    protected static string $resource = TeamMemberResource::class;
}
