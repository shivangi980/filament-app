<?php

namespace App\Filament\Resources\ResidentResource\Pages;

use App\Filament\Resources\ResidentResource;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;

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
        // Set the status in the form state
        $this->form->fill([
            'status' => $status,
        ]);

        // Save the record
        // $this->createRecord();
    }

    protected function handleRecordCreation(array $data): Model
    {
        // Create and return the new record
        return $this->getModel()::create($data);
    }

}
