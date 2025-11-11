<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employers and Employees</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #e0e7ff, #f9fafb);
            color: #1e293b;
            margin: 40px;
        }

        h1, h2 {
            text-align: center;
            color: #1d4ed8;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin-bottom: 40px;
        }

        th {
            background-color: #1d4ed8;
            color: white;
            padding: 12px 15px;
            font-size: 1rem;
            text-align: left;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e2e8f0;
        }

        tr:hover td {
            background-color: #f8fafc;
            transition: 0.3s ease;
        }

        .company-name {
            font-weight: 600;
            color: #1e3a8a;
        }

        small {
            color: #64748b;
            font-size: 0.85rem;
        }

        table:hover {
            transform: scale(1.01);
            box-shadow: 0 6px 16px rgba(0,0,0,0.15);
            transition: 0.3s ease;
        }

        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            th { display: none; }
            td {
                border: none;
                position: relative;
                padding-left: 50%;
            }
            td::before {
                position: absolute;
                top: 15px;
                left: 15px;
                width: 45%;
                white-space: nowrap;
                font-weight: bold;
                color: #1d4ed8;
            }
        }
    </style>
</head>
<body>

    <h1>Employer and Employee Directory</h1>

    {{-- Employers Table --}}
    <h2>Employers</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Company Name</th>
                <th>Employer Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employers as $index => $employer)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="company-name">{{ $employer->company_name }}</td>
                    <td>{{ $employer->name }}</td>
                    <td>{{ $employer->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Employees Table --}}
    <h2>Employees</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Employee Name</th>
                <th>Position</th>
                <th>Age</th>
                <th>Email</th>
                <th>Company</th>
            </tr>
        </thead>
        <tbody>
            @php $counter = 1; @endphp
            @foreach ($employers as $employer)
                @foreach ($employer->employees as $employee)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->age }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employer->company_name }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

</body>
</html>
