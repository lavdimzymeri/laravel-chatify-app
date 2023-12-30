<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    body {
        padding-top: 90px !important;
        background: linear-gradient(135deg, #ff00cc, #3333ff);
    }

    .user-card {
        margin: 20px !important;
        width: 100%;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        background-color: #fff;
        transition: transform 0.3s;

    }

    .user-card:hover {
        transform: translateY(-5px);
    }

    .user-card img {
        max-width: 100%;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .user-card-content {
        padding: 20px;
    }

    .user-card h2,
    .user-card h3 {
        font-size: 18px;
    }

    .chat-btn {
        background-color: transparent;
        padding: 10px 20px;
        border: 1px solid #3333ff;
        color: #3333ff;
        text-decoration: none;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
        display: inline-block;
    }

    .chat-btn:hover {
        background-color: #3333ff;
        color: #fff;
    }

    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px 0;
        width: 100%;
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
        color: #fff;
        background-color: #3333ff;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .pagination a {
        text-decoration: none;
        color: #3333ff;
        background-color: #fff;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .pagination a:hover {
        background-color: #3333ff;
        color: #fff;
    }

    .pagination .pagination-previous,
    .pagination .pagination-next {
        padding: 5px;
    }

    .pagination svg {
        width: 15px;
    }
</style>
@include('components-project.navbar')
<div class="container">
    <div class="row">
        @if ($profiles->count() > 0)
            @foreach ($profiles as $user)
                <div class="col-md-4">
                    <div class="user-card">
                        <img src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('storage/users-avatar/avatar.png') }}"
                            alt="User Image">
                        <div class="user-card-content">
                            <h2>{{ $user->name }}</h2>
                            <h3>{{ $user->username }}</h3>
                            <h5 class="card-title">{{ $user->user->name }}</h5>
                            <p class="card-text">{{ $user->user->username }}</p>
                            <a href="{{ route('loginAsUser', $user->user) }}" class="btn btn-primary">Login as this
                                user</a> <a href="{{ url('chatify', ['id' => $user->id]) }}" class="chat-btn">
                                <i class="fas fa-comment"></i> Chat
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12 text-center">
                <h2>No users found</h2>
            </div>
        @endif
    </div>
</div>
@include('components-project.footer')
@include('Chatify::layouts.footerLinks')