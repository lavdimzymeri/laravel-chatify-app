<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        margin-top: 100px;
        background: rgb(63, 94, 251);
        background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .user-card {
        width: calc(15% - 16px);
        margin: 8px;
        perspective: 1000px;
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
        background: rgb(70, 68, 68);
        background: linear-gradient(0deg, rgba(70, 68, 68, 1) 0%, rgba(45, 0, 0, 1) 46%, rgba(70, 68, 68, 1) 100%);
        border-radius: 15px;
        color: white;
    }

    .back {
        background: rgb(70, 68, 68);
        background: linear-gradient(0deg, rgba(70, 68, 68, 1) 0%, rgba(45, 0, 0, 1) 46%, rgba(70, 68, 68, 1) 100%);
        border-radius: 15px;
        color: white;
        transform: rotateY(180deg);
    }

    .user-card img {
        max-width: 100%;
        height: 449px;
        border-radius: 10px;
    }

    .user-card h5,
    .user-card p {
        font-size: 14px;
    }

    .chat-btn {
        background-color: transparent;
        padding: 25px;
        color: blue;
        text-decoration: none;
        font-size: 25px;
    }

    @media (min-width: 768px) and (max-width: 992px) {
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
        background-color: #fff;
        padding: 10px;
        color: red;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .pagination a {
        text-decoration: none;
        color: white;
        background-color: #fff;
        padding: 10px;
        color: red;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .pagination a:hover {
        background-color: #fff;
        color: blue;
    }

    .pagination .pagination-previous,
    .pagination .pagination-next {
        padding: 5px;
    }

    .pagination svg {
        width: 15px;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@include('components-project.navbar')
<div class="container">
    @foreach ($users as $user)
        <div class="user-card">
            <div class="user-card-inner">
                <div class="front">
                    <img src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('storage/profile-photos/default.jpeg') }}"
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
@include('components-project.footer')
