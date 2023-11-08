<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    /* Custom styles for user cards */
    .user-card {
        height: 100%;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .card-title {
        font-weight: bold;
        font-size: 1.25rem;
    }

    .card-text {
        font-size: 1rem;
    }

    .btn-primary {
        background-color: #007BFF;
        color: #fff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    /* Font Awesome icon styling */
    .fa-comment {
        margin-right: 5px;
    }
</style>

<div class="">
    <div class="row">
        @foreach ($profiles as $user)
            <div class="col-md-1 mt-2">
                <div class="card user-card mb-4">
                    <img src="{{ $user->avatar ? asset('storage/users-avatar/' . $user->avatar) : asset('storage/users-avatar/avatar.png') }}" alt="User Image" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->user->name }}</h5>
                        <p class="card-text">{{ $user->user->username }}</p>
                        <a href="{{ route('loginAsUser', $user->user) }}" class="btn btn-primary">Login as this user</a>
                        {{$user->user->id}}
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ url('chatify', ['id' => $user->user->id]) }}" class="btn btn-primary">
                            <i class="fas fa-comment"></i> Chat
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
