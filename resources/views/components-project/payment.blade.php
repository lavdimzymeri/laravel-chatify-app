{{-- @include('components-project.navbar')
<style>
    body {
        margin: 0;
        background: rgb(63, 94, 251);
        background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
        display: flex;
        flex-direction: column;
        min-height: 100%;
    }

    .cards-container {
        margin-top: 100px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        padding: 20px;
        flex-grow: 1;
    }

    .card {
        flex: 0 0 calc(20.33% - 20px);
        background: rgb(34, 193, 195);
        background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(253, 187, 45, 1) 100%);
        box-shadow: 0 24px 28px 0 rgba(0, 0, 0, 0.2);
        text-align: center;
        font-family: arial;
        margin-bottom: 20px;
        border-radius: 10px;
    }

    .price {
        color: #fff;
        font-size: 22px;
    }

    .card button {
        border: none;
        outline: 0;
        padding: 12px;
        color: white;
        background-color: red;
        text-align: center;
        cursor: pointer;
        width: 90%;
        font-size: 18px;
        margin-top: 30%;
        border-radius:5px;
    }

    .card button:hover {
        opacity: 0.7;
    }
    .image{
        border-radius:90%;
        padding-top:20%;
    }
</style>

<div class="cards-container">
    @foreach ($paymentPacks as $pack)
        <div class="card">
            <img class="image" src="{{ asset('assets/imgs/coins.png') }}" alt="Denim Jeans">
            <h1>{{ $pack->name }}</h1>
            <p class="price">${{ $pack->price }}</p>
            <p>{{ $pack->description }}</p>
            <p><button>Buy Now</button></p>
        </div>
    @endforeach
</div> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Buy Coins</title>
    <style>
        body {
            background: rgb(63, 94, 251);
            background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .container {
            margin-top: 20px;
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
        </div>
    </div>
</body>

</html>
