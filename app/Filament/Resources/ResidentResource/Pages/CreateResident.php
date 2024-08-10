<?php

namespace App\Filament\Resources\ResidentResource\Pages;

use App\Filament\Resources\ResidentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;

class CreateResident extends CreateRecord
{
    protected static string $resource = ResidentResource::class;

    public function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save')
                ->action(fn () => $this->saveAs('published'))
                ->keyBindings(['mod+s']), // Optional: Adds a keyboard shortcut
            
            Action::make('saveAsDraft')
                ->label('Save as Draft')
                ->action(fn () => $this->saveAs('draft'))
                ->color('primary')
                ->keyBindings(['mod+d']), // Optional: Adds a keyboard shortcut
        ];
    }

    protected function saveAs(string $status)
    {
        $this->data['status'] = $status;
        $this->createRecord();
    }

    protected function handleRecordCreation(array $data): mixed
    {
        // Modify the $data array before saving if necessary
        return $this->getModel()::create($data);
    }
}
