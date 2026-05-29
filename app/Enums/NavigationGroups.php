<?php

namespace App\Enums;

use App\Filament\Navigation\NavigationGroups as FilamentNavigationGroups;

class NavigationGroups
{
    public const string CMS = FilamentNavigationGroups::CMS;

    public const string BLOG = FilamentNavigationGroups::BLOG;

    public const string PUBLICATIONS_AND_EVENTS = FilamentNavigationGroups::PUBLICATIONS_AND_EVENTS;

    public const string PEOPLE_AND_PARTNERS = FilamentNavigationGroups::PEOPLE_AND_PARTNERS;

    public const string ENQUIRIES = FilamentNavigationGroups::ENQUIRIES;
}
