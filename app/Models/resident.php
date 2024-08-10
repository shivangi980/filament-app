<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_of_admission',
        'first_name',
        'last_name',
        'picture',
        'dob',
        'social_security',
        'gender',
        'isactive',
        'room_number',
        'bed',
        'race',
        'marital_status',
        'religion',
        'notes',
        'primary_name',
        'primary_relationship',
        'primary_phone',
        'primary_mobile',
        'primary_mail',
        'primary_address',
        'secondary_name',
        'secondary_relationship',
        'secondary_phone',
        'secondary_mobile',
        'secondary_mail',
        'secondary_address',
        'insurance1',
        'insurance2',
        'mediciad',
        'policy_type',
        'insurance_relationship',
        'drug_plan1',
        'drug_plan2',
        'completed_1823_file',
        'completed_1823_date',
        'dnr_file',
        'dialysis_patient',
        'dialysis_center',
        'dialysis_center_phone',
        'under_hospice_care',
        'hospice_Provider',
        'hospice_provider_phone',
        'allergies',
        'medical_notes',
        'medical_physician_name',
        'medical_physician_phone',
        'medical_physician_address',
        'medical_physician_email',
        'psychiatric_physician_name',
        'psychiatric_physician_phone',
        'psychiatric_physician_address',
        'psychiatric_physician_mail',
        'signed_contract_file',
        'contract_amount',
        'durable_power',
        'clear_health_alliance',
        'long_care_provider',
        'long_care_number',
        'case_worker_last_name',
        'case_worker_first_name',
        'case_worker_phone',
        'assistive_care_service',
        'oss',
        'mma_plan',
        'mma',
        'financial_notes',
        'admitted_form',
        'date_of_discharge',
        'discharged_to',
        'discharge_reason',
        'discharge_notes',
        // 'date_out',
        // 'date_in',
        // 'sent_to',
        // 'bed_notes',
        'status',
    ];

    protected $casts = [
        'date_out' => 'array', 
        'date_in' => 'array',
        'sent_to' => 'array',
        'bed_notes' => 'array',
    ];

    public function getPictureUrlAttribute()
    {
        return $this->picture ? Storage::url($this->picture) : null;
    }
}
