<?php

namespace App\Filament\Resources\MembersResource\Pages;

use App\Filament\Resources\MembersResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateMembers extends CreateRecord
{
    protected static string $resource = MembersResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Registro Cadastrado')
            ->body('Seu registro foi criado com sucesso.');
    }
}
