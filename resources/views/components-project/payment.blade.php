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
    <title>Payment Packs</title>
    <style>
        body {
            background: rgb(63, 94, 251);
            background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
            display: flex;
            flex-direction: column;
            min-height: 100%;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .container {
            margin-top: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .payment-card {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: 15%;
            display: inline-block;
            text-align: center;
            border-radius: 10px;
            /* Added border radius */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            /* Added box shadow */
            background-color: white;
        }

        .payment-card button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .payment-card button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @include('components-project.navbar')
    <div class="container">
        <div class="payment-card">
            <p>Price: $33</p>
            <p>Mobile Phone</p>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex fugiat possimus iste doloribus praesentium
                maiores, qui culpa quisquam libero ratione, vel mollitia quo recusandae velit illo nam quidem? Minima,
                exercitationem.</p>
            <form action="{{ route('paypal') }}" method="post">
                @csrf
                <input type="hidden" name="price" value="33" />
                <button type="submit">Pay with PayPal</button>
            </form>
        </div>

        <div class="payment-card">
            <p>Price: $50</p>
            <p>Smartphone</p>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex fugiat possimus iste doloribus praesentium
                maiores, qui culpa quisquam libero ratione, vel mollitia quo recusandae velit illo nam quidem? Minima,
                exercitationem.</p>
            <form action="{{ route('paypal') }}" method="post">
                @csrf
                <input type="hidden" name="price" value="50" />
                <button type="submit">Pay with PayPal</button>
            </form>
        </div>

        <div class="payment-card">
            <p>Price: $75</p>
            <p>High-End Phone</p>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex fugiat possimus iste doloribus praesentium
                maiores, qui culpa quisquam libero ratione, vel mollitia quo recusandae velit illo nam quidem? Minima,
                exercitationem.</p>
            <form action="{{ route('paypal') }}" method="post">
                @csrf
                <input type="hidden" name="price" value="75" />
                <button type="submit">Pay with PayPal</button>
            </form>
        </div>

        <div class="payment-card">
            <p>Price: $100</p>
            <p>Flagship Device</p>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex fugiat possimus iste doloribus praesentium
                maiores, qui culpa quisquam libero ratione, vel mollitia quo recusandae velit illo nam quidem? Minima,
                exercitationem.</p>
            <form action="{{ route('paypal') }}" method="post">
                @csrf
                <input type="hidden" name="price" value="100" />
                <button type="submit">Pay with PayPal</button>
            </form>
        </div>
    </div>
</body>

</html>
