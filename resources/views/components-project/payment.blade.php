    <style>
        body {
            background: rgb(63, 94, 251);
            background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            margin-top: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        .coin-card {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 10px;
            width: 250px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background-color: white;
        }

        .coin-card p {
            margin-bottom: 10px;
        }

        .coin-card button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .coin-card button:hover {
            background-color: #0056b3;
        }
    </style>
    </head>

    <body>
        @include('components-project.navbar')
        <div class="container">
            <div class="coin-card">
                <p>Coins Package 1</p>
                <p>100 Coins</p>
                <img src="{{ asset('assets/imgs/coins.png') }}" alt="Profile Image" />
                <p>Get started with 100 coins and unlock amazing features!</p>
                <p>Price: $5.99</p>
                <form action="{{ route('paypal') }}" method="post">
                    @csrf
                    <input type="hidden" name="price" value="5.99" />
                    <button type="submit">Pay with Paypal</button>
                </form>
                <form action="{{ route('stripe') }}" method="post">
                    @csrf
                    <input type="hidden" name="price" value="5.99" />
                    <button type="submit">Pay With Stripe</button>
                </form>
            </div>

            <div class="coin-card">
                <p>Coins Package 2</p>
                <p>250 Coins</p>
                <img src="{{ asset('assets/imgs/coins.png') }}" alt="Profile Image" />
                <p>Enjoy 250 coins and enhance your experience!</p>
                <p>Price: $12.99</p>
                <form action="{{ route('paypal') }}" method="post">
                    @csrf
                    <input type="hidden" name="price" value="12.99" />
                    <button type="submit">Pay with Paypal</button>
                </form>
                <form action="{{ route('stripe') }}" method="post">
                    @csrf
                    <input type="hidden" name="price" value="12.99" />
                    <button type="submit">Pay With Stripe</button>
                </form>
            </div>

            <div class="coin-card">
                <p>Coins Package 3</p>
                <p>500 Coins</p>
                <img src="{{ asset('assets/imgs/coins.png') }}" alt="Profile Image" />
                <p>Unlock premium features with 500 coins!</p>
                <p>Price: $24.99</p>
                <form action="{{ route('paypal') }}" method="post">
                    @csrf
                    <input type="hidden" name="price" value="24.99" />
                    <button type="submit">Pay with Paypal</button>
                </form>
                <form action="{{ route('stripe') }}" method="post">
                    @csrf
                    <input type="hidden" name="price" value="24.99" />
                    <button type="submit">Pay With Stripe</button>
                </form>
            </div>

            <div class="coin-card">
                <p>Coins Package 4</p>
                <p>1000 Coins</p>
                <img src="{{ asset('assets/imgs/coins.png') }}" alt="Profile Image" />
                <p>Maximize your experience with 1000 coins!</p>
                <p>Price: $44.99</p>
                <form action="{{ route('paypal') }}" method="post">
                    @csrf
                    <input type="hidden" name="price" value="44.99" />
                    <button type="submit">Pay with Paypal</button>
                </form>
                <form action="{{ route('stripe') }}" method="post">
                    @csrf
                    <input type="hidden" name="price" value="44.99" />
                    <button type="submit">Pay With Stripe</button>
                </form>
            </div>
        </div>
