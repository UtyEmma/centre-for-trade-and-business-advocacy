<?php

namespace App\Filament\Resources\TeamMembers\Pages;

use App\Filament\Resources\Support\Pages\CmsListRecords;
use App\Filament\Resources\TeamMembers\TeamMemberResource;

class ListTeamMembers extends CmsListRecords
{
    protected static string $resource = TeamMemberResource::class;
}
