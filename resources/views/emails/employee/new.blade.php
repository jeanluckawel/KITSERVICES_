<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Employee Added</title>
    <style>
        caption {
            font-style: italic;
            color: #555;
        }
        td, th {
            padding: 0.5em;
        }
        th {
            background-color: #e67e22;
        }
        td {
            border: 1px dashed #aaa;
        }
        tfoot {
            background-color: #c98fde;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            padding: 20px;
            color: #333;
        }
        .email-container {
            background-color: #fff;
            border-radius: 8px;
            padding: 10px;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        h1 {
            color: #e67e22;
        }
        .employee-info {
            margin: 20px 0;
        }
        .employee-info p {
            margin: 5px 0;
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin-top: 20px;
            background-color: #e67e22;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            margin-top: 30px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>
<body>
<div class="email-container">
    <h3>New Employee Added</h3>

    <p class="employee-info">
        A new employee was successfully added on {{ now()->format('F j, Y \a\t H:i') }}.
    </p>

    <table>
{{--        <caption>Employee Details</caption>--}}
        <thead>
        <tr>
            <th colspan="2" style="color: white">Employee Details</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Last Name</td>
            <td>{{ $employee->last_name ?? '' }}</td>
        </tr>
        <tr>
            <td>First Name</td>
            <td>{{ $employee->first_name ?? '' }}</td>
        </tr>
        <tr>
            <td>Personal ID</td>
            <td>{{ $employee->personal_id ?? '' }}</td>
        </tr>
        <tr>
            <td>Birth Date</td>
            <td>{{ $employee->birth_date ?? '' }}</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>{{ $employee->gender ?? '' }}</td>
        </tr>
        <tr>
            <td>Marital Status</td>
            <td>{{ $employee->marital_status ?? '' }}</td>
        </tr>
        <tr>
            <td>Mobile Phone</td>
            <td>{{ $employee->mobile_phone ?? '' }}</td>
        </tr>
        <tr>
            <td>Grade Level</td>
            <td>{{ $employee->echelon ?? '' }}</td>
        </tr>
        <tr>
            <td>Department</td>
            <td>{{ $employee->department ?? '' }}</td>
        </tr>
        <tr>
            <td>Function</td>
            <td>{{ $employee->function ?? '' }}</td>
        </tr>
        <tr>
            <td>Contract Type</td>
            <td>{{ $employee->contract_type ?? '' }}</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <th colspan="2">
                <a href="{{ route('employees.show', $employee->employee_id) }}" style="text-align: center; color: white; text-decoration: none">More Info</a>
            </th>
        </tr>
        </tfoot>
    </table>
    <div class="footer">
        <p>Thanks,</p>
        <p>{{ config('app.name') }}</p>
    </div>
</div>
</body>
</html>
