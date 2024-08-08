<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResidentResource\Pages;
use App\Filament\Resources\ResidentResource\RelationManagers;
use App\Models\resident;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Columns;
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
                Section::make('ADD RESIDENT')
                    ->schema ([
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
                    ]),
                Section::make('EMERGENCY CONTACTS')
                    ->schema([
                        Columns::make([
                            Section::make('Primary Contact')
                                ->schema([
                                    TextInput::make('primary_name')->required(),
                                    TextInput::make('primary_relationship')->required(),
                                    TextInput::make('primary_phone')->required(),
                                    TextInput::make('primary_mobile')->required(),
                                    TextInput::make('primary_mail')->required(),
                                    TextInput::make('primary_address')->required(),
                                ]),
                            Section::make('Secondary Contact')
                                ->schema([
                                    TextInput::make('secondary_name')->required(),
                                    TextInput::make('secondary_relationship')->required(),
                                    TextInput::make('secondary_phone')->required(),
                                    TextInput::make('secondary_mobile')->required(),
                                    TextInput::make('secondary_mail')->required(),
                                    TextInput::make('secondary_address')->required(),
                                ]),
                        ]),
                            
                    ]),
                Section::make('INSURANCE')
                    ->schema([
                        TextInput::make('insurance1')->required(),
                        TextInput::make('insurance2')->required(),
                        TextInput::make('mediciad')->required(),
                        TextInput::make('policy_type')->required(),
                        TextInput::make('insurance_relationship')->required(),
                        TextInput::make('drug_plan1')->required(),
                        TextInput::make('drug_plan2')->required(),
                    ]),
                Section::make('MEDICAL')
                    ->schema([
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
                    ]),
                Section::make('PRIMARY PHYSICIAN')
                    ->schema([
                        TextInput::make('medical_physician_name')->required(),
                        TextInput::make('medical_physician_phone')->required(),
                        TextInput::make('medical_physician_address')->required(),
                        TextInput::make('medical_physician_email')->required(),
                    ]),
                Section::make('PSYCHIATRIC PHYSICIAN')
                    ->schema([
                        TextInput::make('psychiatric_physician_name')->required(),
                        TextInput::make('psychiatric_physician_phone')->required(),
                        TextInput::make('psychiatric_physician_address')->required(),
                        TextInput::make('psychiatric_physician_mail')->required(),
                    ]),
                Section::make('FINANCIAL')
                    ->schema([
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
                    ]),
                    Section::make('ADMISSION')
                    ->schema([
                        TextInput::make('admitted_form')->required(),
                        DatePicker::make('date_of_discharge')->required(),
                        TextInput::make('discharged_to')->required(),
                        TextInput::make('discharge_reason')->required(),
                        TextInput::make('discharge_notes')->required(),
                    ]),
                    Section::make('BED HOLDS')
                    ->schema([
                        DatePicker::make('date_out')->required(),
                        DatePicker::make('date_in')->required(),
                        TextInput::make('sent_to')->required(),
                        Textarea::make('bed_notes')->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // 
                TextInput::make('date_of_admission'),
                TextInput::make('first_name'),
                TextInput::make('last_name'),
                FileUpload::make('picture')
                ->image()
                ->required(),
                TextInput::make('dob'),
                TextInput::make('social_security'),
                TextInput::make('gender'),
                TextInput::make('room_number'),
                TextInput::make('bed'),
                TextInput::make('race'),
                TextInput::make('marital_status'),
                TextInput::make('religion'),
                Textarea::make('notes'),
                TextInput::make('primary_name'),
                TextInput::make('primary_relationship'),
                TextInput::make('primary_phone'),
                TextInput::make('primary_mobile'),
                TextInput::make('primary_mail'),
                TextInput::make('primary_address'),
                TextInput::make('secondary_name'),
                TextInput::make('secondary_relationship'),
                TextInput::make('secondary_phone'),
                TextInput::make('secondary_mobile'),
                TextInput::make('secondary_mail'),
                TextInput::make('secondary_address'),
                TextInput::make('insurance1'),
                TextInput::make('insurance2'),
                TextInput::make('mediciad'),
                TextInput::make('policy_type'),
                TextInput::make('insurance_relationship'),
                TextInput::make('drug_plan1'),
                TextInput::make('drug_plan2'),
                TextInput::make('completed_1823_file'),
                DatePicker::make('completed_1823_date'),
                TextInput::make('dnr_file'),
                TextInput::make('dialysis_patient'),
                TextInput::make('dialysis_center'),
                TextInput::make('dialysis_center_phone'),
                TextInput::make('under_hospice_care'),
                TextInput::make('hospice_Provider'),
                TextInput::make('hospice_provider_phone'),
                TextInput::make('allergies'),
                TextInput::make('medical_notes'),
                TextInput::make('medical_physician_name'),
                TextInput::make('medical_physician_phone'),
                TextInput::make('medical_physician_address'),
                TextInput::make('medical_physician_email'),
                TextInput::make('psychiatric_physician_name'),
                TextInput::make('psychiatric_physician_phone'),
                TextInput::make('psychiatric_physician_address'),
                TextInput::make('psychiatric_physician_mail'),
                TextInput::make('signed_contract_file'),
                TextInput::make('contract_amount'),
                TextInput::make('durable_power'),
                TextInput::make('clear_health_alliance'),
                TextInput::make('long_care_provider'),
                TextInput::make('long_care_number'),
                TextInput::make('case_worker_last_name'),
                TextInput::make('case_worker_first_name'),
                TextInput::make('case_worker_phone'),
                TextInput::make('assistive_care_service'),
                TextInput::make('oss'),
                TextInput::make('mma_plan'),
                TextInput::make('mma'),
                TextInput::make('financial_notes'),
                TextInput::make('admitted_form'),
                DatePicker::make('date_of_discharge'),
                TextInput::make('discharged_to'),
                TextInput::make('discharge_reason'),
                TextInput::make('discharge_notes'),
                DatePicker::make('date_out'),
                DatePicker::make('date_in'),
                TextInput::make('sent_to'),
                Textarea::make('bed_notes'),
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
