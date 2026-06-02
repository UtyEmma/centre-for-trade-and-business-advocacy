<?php

namespace App\Filament\Resources\NewsletterCampaigns\Pages;

use App\Filament\Resources\NewsletterCampaigns\Actions\PreviewNewsletterCampaignAction;
use App\Filament\Resources\NewsletterCampaigns\Actions\QueueNewsletterCampaignAction;
use App\Filament\Resources\NewsletterCampaigns\NewsletterCampaignResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditNewsletterCampaign extends EditRecord
{
    protected static string $resource = NewsletterCampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            PreviewNewsletterCampaignAction::make(),
            QueueNewsletterCampaignAction::make(),
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
