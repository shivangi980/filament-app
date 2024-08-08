<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResidentResource\Pages;
use App\Filament\Resources\ResidentResource\RelationManagers;
use App\Models\resident;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResidentResource extends Resource
{
    protected static ?string $model = Resident::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                DatePicker::make('date_of_admission')->required(),
                TextInput::make('first_name')->required(),
                TextInput::make('last_name')->required(),
                FileUpload::make('picture')
                ->image()
                ->required(),
                DatePicker::make('dob')->required(),
                TextInput::make('social_security')->required(),
                Select::make('gender')
                ->options([
                    'male' => 'Male',
                    'female' => 'Female',
                ])
                ->required(),
                TextInput::make('room_number')->required(),
                TextInput::make('bed')->required(),
                TextInput::make('race')->required(),
                Select::make('marital_status')
                ->options([
                    'married' => 'Married',
                    'unmarried' => 'Unmarried',
                    'widow' => 'Widow', 
                ])
                ->required(),
                TextInput::make('religion')->required(),
                Textarea::make('notes')->required(),
                TextInput::make('primary_name')->required(),
                TextInput::make('primary_relationship')->required(),
                TextInput::make('primary_phone')->required(),
                TextInput::make('primary_mobile')->required(),
                TextInput::make('primary_mail')->required(),
                TextInput::make('primary_address')->required(),
                TextInput::make('secondary_name')->required(),
                TextInput::make('secondary_relationship')->required(),
                TextInput::make('secondary_phone')->required(),
                TextInput::make('secondary_mobile')->required(),
                TextInput::make('secondary_mail')->required(),
                TextInput::make('secondary_address')->required(),
                TextInput::make('insurance1')->required(),
                TextInput::make('insurance2')->required(),
                TextInput::make('mediciad')->required(),
                TextInput::make('policy_type')->required(),
                TextInput::make('insurance_relationship')->required(),
                TextInput::make('drug_plan1')->required(),
                TextInput::make('drug_plan2')->required(),
                TextInput::make('completed_1823_file')->required(),
                DatePicker::make('completed_1823_date')->required(),
                TextInput::make('dnr_file')->required(),
                TextInput::make('dialysis_patient')->required(),
                TextInput::make('dialysis_center')->required(),
                TextInput::make('dialysis_center_phone')->required(),
                TextInput::make('under_hospice_care')->required(),
                TextInput::make('hospice_Provider')->required(),
                TextInput::make('hospice_provider_phone')->required(),
                TextInput::make('allergies')->required(),
                TextInput::make('medical_notes')->required(),
                TextInput::make('medical_physician_name')->required(),
                TextInput::make('medical_physician_phone')->required(),
                TextInput::make('medical_physician_address')->required(),
                TextInput::make('medical_physician_email')->required(),
                TextInput::make('psychiatric_physician_name')->required(),
                TextInput::make('psychiatric_physician_phone')->required(),
                TextInput::make('psychiatric_physician_address')->required(),
                TextInput::make('psychiatric_physician_mail')->required(),
                TextInput::make('signed_contract_file')->required(),
                TextInput::make('contract_amount')->required(),
                TextInput::make('durable_power')->required(),
                TextInput::make('clear_health_alliance')->required(),
                TextInput::make('long_care_provider')->required(),
                TextInput::make('long_care_number')->required(),
                TextInput::make('case_worker_last_name')->required(),
                TextInput::make('case_worker_first_name')->required(),
                TextInput::make('case_worker_phone')->required(),
                TextInput::make('assistive_care_service')->required(),
                TextInput::make('oss')->required(),
                TextInput::make('mma_plan')->required(),
                TextInput::make('mma')->required(),
                TextInput::make('financial_notes')->required(),
                TextInput::make('admitted_form')->required(),
                DatePicker::make('date_of_discharge')->required(),
                TextInput::make('discharged_to')->required(),
                TextInput::make('discharge_reason')->required(),
                TextInput::make('discharge_notes')->required(),
                DatePicker::make('date_out')->required(),
                DatePicker::make('date_in')->required(),
                TextInput::make('sent_to')->required(),
                Textarea::make('bed_notes')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResidents::route('/'),
            'create' => Pages\CreateResident::route('/create'),
            'edit' => Pages\EditResident::route('/{record}/edit'),
        ];
    }
}
