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
use Filament\Tables\Columns\TextColumn;
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
                TextColumn::make('date_of_admission'),
                TextColumn::make('first_name'),
                TextColumn::make('last_name'),
                TextColumn::make('picture'),
                TextColumn::make('dob'),
                TextColumn::make('social_security'),
                TextColumn::make('gender'),
                TextColumn::make('room_number'),
                TextColumn::make('bed'),
                TextColumn::make('race'),
                TextColumn::make('marital_status'),
                TextColumn::make('religion'),
                TextColumn::make('notes'),
                TextColumn::make('primary_name'),
                TextColumn::make('primary_relationship'),
                TextColumn::make('primary_phone'),
                TextColumn::make('primary_mobile'),
                TextColumn::make('primary_mail'),
                TextColumn::make('primary_address'),
                TextColumn::make('secondary_name'),
                TextColumn::make('secondary_relationship'),
                TextColumn::make('secondary_phone'),
                TextColumn::make('secondary_mobile'),
                TextColumn::make('secondary_mail'),
                TextColumn::make('secondary_address'),
                TextColumn::make('insurance1'),
                TextColumn::make('insurance2'),
                TextColumn::make('mediciad'),
                TextColumn::make('policy_type'),
                TextColumn::make('insurance_relationship'),
                TextColumn::make('drug_plan1'),
                TextColumn::make('drug_plan2'),
                TextColumn::make('completed_1823_file'),
                TextColumn::make('completed_1823_date'),
                TextColumn::make('dnr_file'),
                TextColumn::make('dialysis_patient'),
                TextColumn::make('dialysis_center'),
                TextColumn::make('dialysis_center_phone'),
                TextColumn::make('under_hospice_care'),
                TextColumn::make('hospice_Provider'),
                TextColumn::make('hospice_provider_phone'),
                TextColumn::make('allergies'),
                TextColumn::make('medical_notes'),
                TextColumn::make('medical_physician_name'),
                TextColumn::make('medical_physician_phone'),
                TextColumn::make('medical_physician_address'),
                TextColumn::make('medical_physician_email'),
                TextColumn::make('psychiatric_physician_name'),
                TextColumn::make('psychiatric_physician_phone'),
                TextColumn::make('psychiatric_physician_address'),
                TextColumn::make('psychiatric_physician_mail'),
                TextColumn::make('signed_contract_file'),
                TextColumn::make('contract_amount'),
                TextColumn::make('durable_power'),
                TextColumn::make('clear_health_alliance'),
                TextColumn::make('long_care_provider'),
                TextColumn::make('long_care_number'),
                TextColumn::make('case_worker_last_name'),
                TextColumn::make('case_worker_first_name'),
                TextColumn::make('case_worker_phone'),
                TextColumn::make('assistive_care_service'),
                TextColumn::make('oss'),
                TextColumn::make('mma_plan'),
                TextColumn::make('mma'),
                TextColumn::make('financial_notes'),
                TextColumn::make('admitted_form'),
                TextColumn::make('date_of_discharge'),
                TextColumn::make('discharged_to'),
                TextColumn::make('discharge_reason'),
                TextColumn::make('discharge_notes'),
                TextColumn::make('date_out'),
                TextColumn::make('date_in'),
                TextColumn::make('sent_to'),
                TextColumn::make('bed_notes'),
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
