<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Monitoring</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Transaction Monitoring</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Invoice Number</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>QR Code</th>
                    <th>Created At</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->invoice_number }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td><a href="{{ $transaction->qr_code }}" target="_blank">View QR Code</a></td>
                        <td>{{ $transaction->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
