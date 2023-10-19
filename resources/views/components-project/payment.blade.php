@include('components-project.navbar')
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
</div>
