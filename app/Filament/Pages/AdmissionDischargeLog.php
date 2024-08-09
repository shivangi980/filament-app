<?php
namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\resident;

class AdmissionDischargeLog extends Page
{
    protected static ?string $navigationLabel = 'Admission/Discharge Log';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.admission-discharge-log';

    public function getResidents()
    {
        return resident::all(); // Adjust query as needed
    }
}
