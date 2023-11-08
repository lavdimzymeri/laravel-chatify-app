<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    @php
        $users = App\Models\User::paginate(25);
    @endphp
    <div class="row">
        @foreach ($users as $user)
            <div class="col-md-3 mt-2">
                <div class="card user-card mb-4" style="height: 100%;">
                    <img src="{{ $user->avatar ? asset('storage/users-avatar/' . $user->avatar) : asset('storage/users-avatar/avatar.png') }}" alt="User Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->username }}</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ url('chatify', ['id' => $user->id]) }}" class="btn btn-primary">
                            <i class="fas fa-comment"></i> Chat
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="d-flex justify-content-center">
    {{ $users->links() }}
</div>
