<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .user-card {
        width: calc(20% - 0px);
        margin: 18px;
        perspective: 1000px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s;
    }

    .user-card:hover {
        transform: translateY(-10px);
    }

    .user-card-inner {
        width: 100%;
        height: 0;
        padding-bottom: 100%;
        position: relative;
        transform-style: preserve-3d;
        transition: transform 1.0s;
    }

    .user-card:hover .user-card-inner {
        transform: rotateY(180deg);
    }

    .front,
    .back {
        width: 100%;
        height: 100%;
        position: absolute;
        backface-visibility: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .front {
        background: #3498db;
        /* Change to your preferred background color */
        border-radius: 15px;
        color: white;
    }

    .back {
        background: rgb(63, 94, 251);
        background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
        /* Change to your preferred background color */
        border-radius: 15px;
        color: white;
        transform: rotateY(180deg);
    }

    .user-card img {
        max-width: 100%;
        height: 200px;
        /* Adjust the height as needed */
        border-radius: 10px;
    }

    .user-card h2,
    .user-card h3 {
        font-size: 18px;
        margin: 5px 0;
    }

    .chat-btn {
        background: rgb(63, 94, 251);
        /* Change to your preferred button color */
        padding: 10px 20px;
        color: white;
        text-decoration: none;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .chat-btn:hover {
        background-color: #27ae60;
        /* Change to the hover color */
    }

    @media (max-width: 1200px) {
        .user-card {
            width: calc(33.33% - 16px);
        }
    }

    @media (max-width: 768px) {
        .user-card {
            width: calc(50% - 16px);
        }

        .user-card img {
            height: auto;
        }
    }

    .pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px 0;
        width: 100%;
    }

    .pagination p {
        display: none;
    }

    .pagination ul {
        list-style: none;
        padding: 0;
        display: flex;
    }

    .pagination li {
        display: inline;
        margin: 0 5px;
        height: 50px;
    }

    .active {
        text-decoration: none;
        color: white;
        background-color: #3498db;
        /* Change to your preferred active color */
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .pagination a {
        text-decoration: none;
        color: #3498db;
        /* Change to your preferred text color */
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .pagination a:hover {
        background-color: #f2f2f2;
        /* Change to the hover background color */
    }

    .pagination .pagination-previous,
    .pagination .pagination-next {
        padding: 5px;
    }

    .pagination svg {
        width: 15px;
    }
</style>

<div class="container">
    @php
        $tests = App\Models\User::all();
        $tests = App\Models\User::paginate(25);
    @endphp
    @foreach ($tests as $user)
        <div class="user-card">
            <div class="user-card-inner">
                <div class="front">
                    <img src="{{ $user->avatar ? asset('storage/users-avatar/' . $user->avatar) : asset('storage/users-avatar/avatar.png') }}"
                        alt="User Image">
                    <h2>{{ $user->name }}</h2>
                    <h3>{{ $user->username }}</h3>
                </div>
                <div class="back">
                    <h2>{{ $user->name }}</h2>
                    <h3>{{ $user->username }}</h3>
                    <a href="{{ url('chatify', ['id' => $user->id]) }}" class="chat-btn">
                        <i class="fas fa-comment"></i> Chat
                    </a>
                    <p>{{ $user->bio }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="pagination">
    {{ $users->links() }}
</div>
