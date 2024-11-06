<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .salary-slip {
            width: 80%;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .employee-info {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .employee-info p {
            margin: 0;
        }
        .table-container {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            margin-top: 20px;
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="salary-slip">
        <div class="header">
            Salary Slip
        </div>
        <div class="employee-info">
            <p><strong>Name:</strong> John Doe</p>
            <p><strong>Employee ID:</strong> 12345</p>
            <p><strong>Department:</strong> Finance</p>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Amount (USD)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Basic Salary</td>
                        <td>5000</td>
                    </tr>
                    <tr>
                        <td>Allowances</td>
                        <td>1000</td>
                    </tr>
                    <tr>
                        <td>Deductions</td>
                        <td>500</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="total">
            <p><strong>Total Salary:</strong> 5500 USD</p>
        </div>
    </div>
</body>
</html>