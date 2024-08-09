<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident List</title>
    <style>
        /* Add your styles here to format the print view */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Resident List</h2>
    
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date Admitted</th>
                <th>Date of Birth</th>
                <th>SSN</th>
                <th>Place Admitted From</th>
                <th>Special Notes</th>
                <th>Date of Discharge</th>
                <th>Discharge Reason</th>
                <th>Discharge Notes</th>
                <th>Discharged To</th>
                <!-- Add more fields as necessary -->
            </tr>
        </thead>
        <tbody>
            @foreach ($residents as $resident)
                <tr>
                    <td>{{ $resident->first_name }}</td>
                    <td>{{ $resident->last_name }}</td>
                    <td>{{ $resident->date_of_admission }}</td>
                    <td>{{ $resident->dob }}</td>
                    <td>{{ $resident->social_security }}</td>
                    <td>{{ $resident->admitted_form }}</td>
                    <td>{{ $resident->notes }}</td>
                    <td>{{ $resident->date_of_discharge }}</td>
                    <td>{{ $resident->discharge_reason }}</td>
                    <td>{{ $resident->discharge_notes }}</td>
                    <td>{{ $resident->discharged_to }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
