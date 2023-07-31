<!DOCTYPE html>
<html>
<head>
    <title>Teacher Report</title>
    <style>
        * {
            font-family: 'Arial', sans-serif;
            font-size: 12pt;
        }

        h1 {
            font-size: 28pt;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .logo {
            display: block;
            margin: 0 auto;
            width: 200px;
        }

        .address {
            text-align: center;
            margin-bottom: 24pt;
        }

        .address p {
            font-size: 12pt;
            margin-bottom: 6px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
        }

        .footer {
            margin-top: 24pt;
            text-align: center;
            color: #777;
            font-size: 10pt;
        }

        .report-title {
            text-align: center;
            font-size: 20pt;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .report-header {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .report-header th, .report-header td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="address">
            <img src="{{public_path('images/school.png')}}" class="logo" alt="Logo">
            <p>123 Main Street</p>
            <p>City, State ZIP</p>
            <p>Tel. No.: 555-666-7890</p>
        </div>

        <h1 class="report-title">Teacher Report</h1>

        <table class="report-header">
            <tr>
                <td>Name</td>
                <td>{{$teacher->first_name}} {{$teacher->last_name}}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>{{$teacher->address}}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{$teacher->phone}}</td>
            </tr>
            <tr>
                <td>Birth Date</td>
                <td>{{$teacher->formattedBDate}}</td>
            </tr>
            <tr>
                <td>Grade</td>
                <td>{{$teacher->grade}}</td>
            </tr>
            <tr>
                <td>Rank</td>
                <td>{{$teacher->rank}}</td>
            </tr>
        </table>

        <hr>

        <p>
            Dear Teacher {{$teacher->first_name}},<br>
                We kindly request you to submit your respective reports by the end of this month.
            The reports should include a summary of the topics covered, student progress, and any other relevant information.
            Please ensure that the reports are accurate and comprehensive.
            Your cooperation is highly appreciated.<br>
            Thank you.<br>
            Sincerely,
            <br>
            Principal
        </p>

        <div class="footer">
            <p>Powered by your School</p>
        </div>
    </div>
</body>
</html>
