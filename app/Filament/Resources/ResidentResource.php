<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResidentResource\Pages;
use App\Filament\Resources\ResidentResource\RelationManagers;
use App\Models\resident;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Concerns\HasHelperText;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

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
                        DatePicker::make('date_of_admission')
                        ->label('Date of Admission')
                        ->required(),
                        TextInput::make('first_name')
                        ->label('First Name')
                        ->required(),
                        TextInput::make('last_name')
                        ->label('Last Name')
                        ->required(),
                        FileUpload::make('picture')
                        ->label('Picture Upload')
                        ->image()
                        ->required(),
                        DatePicker::make('dob')
                        ->label('Date of Birth')
                        ->required(),
                        TextInput::make('social_security')
                        ->label('Social Security Number')
                        ->required(),
                        Select::make('gender')
                        ->options([
                            'Male' => 'Male',
                            'Female' => 'Female',
                            'Other' => 'Other',
                        ])
                        ->required(),
                        TextInput::make('room_number')->required(),
                        TextInput::make('bed')->required(),
                        Select::make('race')
                        ->options([
                            'White' => 'White',
                            'Black or African American' => 'Black or African American',
                            'Hispanic/Latino' => 'Hispanic/Latino',
                            'Asian' => 'Asian',
                            'Other' => 'Other'
                        ])
                        ->required(),
                        Select::make('marital_status')
                        ->options([
                            'Single' => 'Single',
                            'Married' => 'Married',
                            'Divorced' => 'Divorced',
                            'Widowed' => 'Widowed', 
                        ])
                        ->required(),
                        TextInput::make('religion')->required(),
                        Textarea::make('notes')->required(),
                    ]),
                Section::make('EMERGENCY CONTACTS')
                    ->schema([
                        Grid::make(2)
                        ->schema([
                            Section::make('Primary Contact')
                                ->schema([
                                    TextInput::make('primary_name')
                                    ->label('Name')
                                    ->required(),
                                    TextInput::make('primary_relationship')
                                    ->label('Relationship')
                                    ->required(),
                                    TextInput::make('primary_phone')
                                    ->label('Home Phone')
                                    ->extraAttributes(['data-mask' => '(999) 999-9999'])
                                    ->placeholder('(___) ___-____')
                                    ->required(),
                                    TextInput::make('primary_mobile')
                                    ->label('Mobile')
                                    ->extraAttributes(['data-mask' => '(999) 999-9999'])
                                    ->placeholder('(___) ___-____')
                                    ->required(),
                                    TextInput::make('primary_mail')
                                    ->label('Email')
                                    ->required(),
                                    TextInput::make('primary_address')
                                    ->label('Address')
                                    ->required(),
                                ]),
                            Section::make('Secondary Contact')
                                ->schema([
                                    TextInput::make('secondary_name')
                                    ->label('Name')
                                    ->required(),
                                    TextInput::make('secondary_relationship')
                                    ->label('Relationship')
                                    ->required(),
                                    TextInput::make('secondary_phone')
                                    ->label('Home Phone')
                                    ->extraAttributes(['data-mask' => '(999) 999-9999'])
                                    ->placeholder('(___) ___-____')
                                    ->required(),
                                    TextInput::make('secondary_mobile')
                                    ->label('Mobile')
                                    ->extraAttributes(['data-mask' => '(999) 999-9999'])
                                    ->placeholder('(___) ___-____')
                                    ->required(),
                                    TextInput::make('secondary_mail')
                                    ->label('Email')
                                    ->required(),
                                    TextInput::make('secondary_address')
                                    ->label('Address')
                                    ->required(),
                                ]),
                        ]),
                            
                    ]),
                Section::make('INSURANCE')
                    ->schema([
                        TextInput::make('insurance1')
                        ->label('Insurance')
                        ->required(),
                        TextInput::make('insurance2')
                        ->label('Insurance #')
                        ->required(),
                        TextInput::make('mediciad')
                        ->label('Mediciad #')
                        ->required(),
                        Select::make('policy_type')
                        ->label('Policy Type')
                        ->options([
                            'Primary' => 'Primary',
                            'Secondary' => 'Secondary',
                            'Tertiary' => 'Tertiary',
                            '' => ''
                        ])
                        ->required(),
                        Select::make('insurance_relationship')
                        ->label('Relationship')
                        ->options([
                            'Self' => 'Self',
                            'Spouse' => 'Spouse',
                            'Other' => 'Other',
                        ])
                        ->required()
                        ->helperText('Please note if the Resident is insured on their own policy or another person\'s.'),
                        TextInput::make('drug_plan1')
                        ->label('Drug Plan Name')
                        ->required(),
                        TextInput::make('drug_plan2')
                        ->label('Drug Plan #')
                        ->required(),
                    ]),
                Section::make('MEDICAL')
                    ->schema([
                        Checkbox::make('completed_1823_file')
                        ->label('Completed 1823 On File?')
                        ->required(),
                        DatePicker::make('completed_1823_date')
                        ->label('1823 Completed Date')
                        ->required(),
                        TextInput::make('dnr_file')
                        ->label('DNR On File?')
                        ->required(),
                        Radio::make('dialysis_patient')
                        ->label('Is dialysis patient?')
                        ->options([
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ])
                        ->required(),
                        TextInput::make('dialysis_center')
                        ->label('Dialysis Center')
                        ->required(),
                        TextInput::make('dialysis_center_phone')
                        ->label('Dialysis Center Phone #')
                        ->extraAttributes(['data-mask' => '(999) 999-9999'])
                        ->placeholder('(___) ___-____')
                        ->required(),
                        Radio::make('under_hospice_care')
                        ->label('Is under hospice care?')
                        ->options([
                            'Yes' => 'Yes',
                            'No' => 'No',
                        ])
                        ->required(),
                        TextInput::make('hospice_Provider')->required(),
                        TextInput::make('hospice_provider_phone')
                        ->label('Hospice Provider Phone #')
                        ->extraAttributes(['data-mask' => '(999) 999-9999'])
                        ->placeholder('(___) ___-____')
                        ->required(),
                        Textarea::make('allergies')->required(),
                        Textarea::make('medical_notes')
                        ->label('Notes')
                        ->required(),
                    ]),
                Section::make('PRIMARY PHYSICIAN')
                    ->schema([
                        TextInput::make('medical_physician_name')
                        ->label('Name')
                        ->required(),
                        TextInput::make('medical_physician_phone')
                        ->label('Phone')
                        ->extraAttributes(['data-mask' => '(999) 999-9999'])
                        ->placeholder('(___) ___-____')
                        ->required(),
                        TextInput::make('medical_physician_address')
                        ->label('Address')
                        ->required(),
                        TextInput::make('medical_physician_email')
                        ->label('Email')
                        ->required(),
                    ]),
                Section::make('PSYCHIATRIC PHYSICIAN')
                    ->schema([
                        TextInput::make('psychiatric_physician_name')
                        ->label('Name')
                        ->required(),
                        TextInput::make('psychiatric_physician_phone')
                        ->label('Phone')
                        ->extraAttributes(['data-mask' => '(999) 999-9999'])
                        ->placeholder('(___) ___-____')
                        ->required(),
                        TextInput::make('psychiatric_physician_address')
                        ->label('Address')
                        ->required(),
                        TextInput::make('psychiatric_physician_mail')
                        ->label('Email')
                        ->required(),
                    ]),
                Section::make('FINANCIAL')
                    ->schema([
                        Checkbox::make('signed_contract_file')
                        ->label('Signed Contract On File?')
                        ->required(),
                        TextInput::make('contract_amount')
                        ->label('Contract Amount')
                        ->required(),
                        Checkbox::make('durable_power')
                        ->label('Durable Power of Attorney On File?')
                        ->required(),
                        Checkbox::make('clear_health_alliance')
                        ->label('Clear Health Alliance')
                        ->required()
                        ->helperText('Mediciade program for HIC+ patients'),
                        Select::make('long_care_provider')
                        ->label('Long Term Care Provider')
                        ->options([
                            'Amerigroup' => 'Amerigroup',
                            'Aetna' => 'Aetna',
                            'FCC' => 'FCC',
                            'Humana' => 'Humana',
                            'Molina' => 'Molina',
                            'Simply' => 'Simply',
                            'Sunshine' => 'Sunshine',
                            'United' => 'United',
                            'Other' => 'Other',
                        ])
                        ->required(),
                        TextInput::make('long_care_number')
                        ->label('Long TErm Care Number')
                        ->required(),
                        TextInput::make('case_worker_last_name')
                        ->label('Case Worker Name:Last')
                        ->required(),
                        TextInput::make('case_worker_first_name')
                        ->label('Case Worker Name:First')
                        ->required(),
                        TextInput::make('case_worker_phone')
                        ->label('Case Worker Phone #')
                        ->extraAttributes(['data-mask' => '(999) 999-9999'])
                        ->placeholder('(___) ___-____')
                        ->required(),
                        Checkbox::make('assistive_care_service')
                        ->label('Assistive Care Services?')
                        ->required(),
                        Checkbox::make('oss')
                        ->label('OSS?')
                        ->required(),
                        TextInput::make('mma_plan')
                        ->label('MMA Plan')
                        ->required(),
                        TextInput::make('mma')
                        ->label('MMA #')
                        ->required(),
                        TextInput::make('financial_notes')
                        ->label('Notes')
                        ->required(),
                    ]),
                    Section::make('ADMISSION')
                    ->schema([
                        TextInput::make('admitted_form')
                        ->label('Admitted Form')
                        ->required(),
                        DatePicker::make('date_of_discharge')
                        ->label('Date of Discharge')
                        ->required(),
                        TextInput::make('discharged_to')
                        ->label('Discharged to')
                        ->required(),
                        TextInput::make('discharge_reason')
                        ->label('Discharge Reason')
                        ->required(),
                        TextInput::make('discharge_notes')
                        ->label('Discharge Notes')
                        ->required(),
                    ]),
                    Section::make('BED HOLDS')
                    ->schema([
                        DatePicker::make('date_out')
                        ->label('Date out')
                        ->required(),
                        DatePicker::make('date_in')
                        ->label('Date in')
                        ->required(),
                        TextInput::make('sent_to')
                        ->label('Sent to')
                        ->required(),
                        Textarea::make('bed_notes')
                        ->label('Notes')
                        ->required(),
                    ]),
                    
                    // Include your custom Blade view with the script
                    Forms\Components\View::make('components.input-mask'),
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
                TextInput::make('completed_1823_date'),
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
                TextInput::make('date_of_discharge'),
                TextInput::make('discharged_to'),
                TextInput::make('discharge_reason'),
                TextInput::make('discharge_notes'),
                TextInput::make('date_out'),
                TextInput::make('date_in'),
                TextInput::make('sent_to'),
                TextInput::make('bed_notes'),
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
