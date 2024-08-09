<x-filament::page>
    <h2>Admission/Discharge Log</h2>
    
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">First Name</th>
                    <th class="px-4 py-2">Last Name</th>
                    <th class="px-4 py-2">Date Admitted</th>
                    <th class="px-4 py-2">Date of Birth</th>
                    <th class="px-4 py-2">SSN</th>
                    <th class="px-4 py-2">Place admitted from</th>
                    <th class="px-4 py-2">Special Notes</th>
                    <th class="px-4 py-2">Date of Discharge</th>
                    <th class="px-4 py-2">Discharge Reason</th>
                    <th class="px-4 py-2">Discharge Notes</th>
                    <th class="px-4 py-2">Discharged To</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->getResidents() as $resident)
                    <tr>
                        <td class="border px-4 py-2">{{ $resident->first_name }}</td>
                        <td class="border px-4 py-2">{{ $resident->last_name }}</td>
                        <td class="border px-4 py-2">{{ $resident->date_of_admission }}</td>
                        <td class="border px-4 py-2">{{ $resident->dob }}</td>
                        <td class="border px-4 py-2">{{ $resident->social_security }}</td>
                        <td class="border px-4 py-2">{{ $resident->admitted_form }}</td>
                        <td class="border px-4 py-2">{{ $resident->notes }}</td>
                        <td class="border px-4 py-2">{{ $resident->date_of_discharge }}</td>
                        <td class="border px-4 py-2">{{ $resident->discharge_reason }}</td>
                        <td class="border px-4 py-2">{{ $resident->discharge_notes }}</td>
                        <td class="border px-4 py-2">{{ $resident->discharged_to }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-filament::page>
