<!DOCTYPE html>
<html>
<head>
    <title>Room Access Logs</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Room Access Logs Report</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Room Name</th>
                <th>Accessed By</th>
                <th>Status</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
            <tr>
                <td>{{ $log['no'] }}</td>
                <td>{{ $log['room_name'] }}</td>
                <td>{{ $log['accessed_by'] }}</td>
                <td>{{ $log['status'] }}</td>
                <td>{{ $log['timestamp'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
