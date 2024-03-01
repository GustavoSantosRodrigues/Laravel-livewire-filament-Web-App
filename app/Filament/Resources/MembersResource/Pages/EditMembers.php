<?php

namespace App\Filament\Resources\MembersResource\Pages;

use App\Filament\Resources\MembersResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditMembers extends EditRecord
{
    protected static string $resource = MembersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
        
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Registro Atualizado')
            ->body('Seu registro foi atualizado com sucesso.');
    }
}
