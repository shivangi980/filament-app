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
            $table->date('date_of_admission');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('picture');
            $table->date('dob');
            $table->string('social_security');
            $table->string('gender');
            $table->string('isactive');
            $table->string('room_number');
            $table->string('bed');
            $table->string('race');
            $table->string('marital_status');
            $table->string('religion');
            $table->text('notes');
            $table->string('primary_name');
            $table->string('primary_relationship');
            $table->string('primary_phone');
            $table->string('primary_mobile');
            $table->string('primary_mail');
            $table->string('primary_address');
            $table->string('secondary_name');
            $table->string('secondary_relationship');
            $table->string('secondary_phone');
            $table->string('secondary_mobile');
            $table->string('secondary_mail');
            $table->string('secondary_address');
            $table->string('insurance1');
            $table->string('insurance2');
            $table->string('mediciad');
            $table->string('policy_type');
            $table->string('insurance_relationship');
            $table->string('drug_plan1');
            $table->string('drug_plan2');
            $table->string('completed_1823_file');
            $table->date('completed_1823_date');
            $table->string('dnr_file');
            $table->string('dialysis_patient');
            $table->string('dialysis_center');
            $table->string('dialysis_center_phone');
            $table->string('under_hospice_care');
            $table->string('hospice_Provider');
            $table->string('hospice_provider_phone');
            $table->text('allergies');
            $table->text('medical_notes');
            $table->string('medical_physician_name');
            $table->string('medical_physician_phone');
            $table->string('medical_physician_address');
            $table->string('medical_physician_email');
            $table->string('psychiatric_physician_name');
            $table->string('psychiatric_physician_phone');
            $table->string('psychiatric_physician_address');
            $table->string('psychiatric_physician_mail');
            $table->string('signed_contract_file');
            $table->string('contract_amount');
            $table->string('durable_power');
            $table->string('clear_health_alliance');
            $table->string('long_care_provider');
            $table->string('long_care_number');
            $table->string('case_worker_last_name');
            $table->string('case_worker_first_name');
            $table->string('case_worker_phone');
            $table->string('assistive_care_service');
            $table->string('oss');
            $table->string('mma_plan');
            $table->string('mma');
            $table->text('financial_notes');
            $table->string('admitted_form');
            $table->date('date_of_discharge');
            $table->string('discharged_to');
            $table->string('discharge_reason');
            $table->text('discharge_notes');
            $table->date('date_out');
            $table->date('date_in');
            $table->string('sent_to');
            $table->text('bed_notes');
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
