<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_admission')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('picture')->nullable();
            $table->date('dob')->nullable();
            $table->string('social_security')->nullable();
            $table->string('gender')->nullable();
            $table->string('isactive')->nullable();
            $table->string('room_number')->nullable();
            $table->string('bed')->nullable();
            $table->string('race')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('religion')->nullable();
            $table->text('notes')->nullable();
            $table->string('primary_name')->nullable();
            $table->string('primary_relationship')->nullable();
            $table->string('primary_phone')->nullable();
            $table->string('primary_mobile')->nullable();
            $table->string('primary_mail')->nullable();
            $table->string('primary_address')->nullable();
            $table->string('secondary_name')->nullable();
            $table->string('secondary_relationship')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('secondary_mobile')->nullable();
            $table->string('secondary_mail')->nullable();
            $table->string('secondary_address')->nullable();
            $table->string('insurance1')->nullable();
            $table->string('insurance2')->nullable();
            $table->string('mediciad')->nullable();
            $table->string('policy_type')->nullable();
            $table->string('insurance_relationship')->nullable();
            $table->string('drug_plan1')->nullable();
            $table->string('drug_plan2')->nullable();
            $table->string('completed_1823_file')->nullable();
            $table->date('completed_1823_date')->nullable();
            $table->string('dnr_file')->nullable();
            $table->string('dialysis_patient')->nullable();
            $table->string('dialysis_center')->nullable();
            $table->string('dialysis_center_phone')->nullable();
            $table->string('under_hospice_care')->nullable();
            $table->string('hospice_Provider')->nullable();
            $table->string('hospice_provider_phone')->nullable();
            $table->text('allergies')->nullable();
            $table->text('medical_notes')->nullable();
            $table->string('medical_physician_name')->nullable();
            $table->string('medical_physician_phone')->nullable();
            $table->string('medical_physician_address')->nullable();
            $table->string('medical_physician_email')->nullable();
            $table->string('psychiatric_physician_name')->nullable();
            $table->string('psychiatric_physician_phone')->nullable();
            $table->string('psychiatric_physician_address')->nullable();
            $table->string('psychiatric_physician_mail')->nullable();
            $table->string('signed_contract_file')->nullable();
            $table->string('contract_amount')->nullable();
            $table->string('durable_power')->nullable();
            $table->string('clear_health_alliance')->nullable();
            $table->string('long_care_provider')->nullable();
            $table->string('long_care_number')->nullable();
            $table->string('case_worker_last_name')->nullable();
            $table->string('case_worker_first_name')->nullable();
            $table->string('case_worker_phone')->nullable();
            $table->string('assistive_care_service')->nullable();
            $table->string('oss')->nullable();
            $table->string('mma_plan')->nullable();
            $table->string('mma')->nullable();
            $table->text('financial_notes')->nullable();
            $table->string('admitted_form')->nullable();
            $table->date('date_of_discharge')->nullable();
            $table->string('discharged_to')->nullable();
            $table->string('discharge_reason')->nullable();
            $table->text('discharge_notes')->nullable();
            $table->json('date_out')->nullable();
            $table->json('date_in')->nullable();
            $table->json('sent_to')->nullable();
            $table->json('bed_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
