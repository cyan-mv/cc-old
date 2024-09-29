<?php

namespace App\Filament\Resources\UserResorceResource\Pages;

use App\Filament\Resources\UserResorceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserResorces extends ListRecords
{
    protected static string $resource = UserResorceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
