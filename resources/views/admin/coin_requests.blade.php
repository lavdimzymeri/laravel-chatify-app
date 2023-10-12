    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .alert {
            margin-top: 20px;
        }

        .table {
            width: 100%;
            background-color: #fff;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: left;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .btn-success,
        .btn-danger {
            padding: 5px 10px;
            margin-right: 5px;
        }
    </style>
    <div class="container">
        <h2>Pending Coin Requests - Admin</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Coins Requested</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendingRequests as $request)
                    <tr>
                        <td>{{ $request->user_id }}</td>
                        <td>{{ $request->coins_requested }}</td>
                        <td>{{ $request->status }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.coin.approve', ['id' => $request->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                            <form method="POST" action="{{ route('admin.coin.cancel', ['id' => $request->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Cancel</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
