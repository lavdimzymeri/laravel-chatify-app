<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Coins to User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .alert {
            background-color: #dff0d8;
            border-color: #d6e9c6;
            color: #3c763d;
            text-align: center;
            padding: 10px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #333;
        }

        select,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select {
            background-color: #fff;
            color: #333;
        }

        input[type="number"] {
            background-color: #f9f9f9;
        }

        button {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Send Coins to User</h2>

        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.send.coins') }}">
            @csrf

            <div class="form-group">
                <label for="user_id">Select User:</label>
                <select name="user_id">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="coins">Coins to Send:</label>
                <input type="number" name="coins" min="1">
            </div>

            <button type="submit">Send Coins</button>
        </form>
    </div>
</body>
</html>
