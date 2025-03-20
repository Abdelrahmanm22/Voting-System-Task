<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('front/assets/css/main.css')}}">
</head>
<body>
<div class="page-wrapper">
    {{--  =====Nav====  --}}
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{URL::asset('front/assets/img/logo-light.png')}}" alt="logo" height="50">
            </a>
            <div class="ms-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-custom" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>


    <!-- ====Main Content==== -->
    <div class="content">
        <div class="container my-5">
        <h1 class="text-center mb-4">Vote for Your Candidate</h1>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        <div class="row row-cols-1 row-cols-md-3">
            @forelse($candidates as $candidate)
                <div class="col">
                    <div class="card candidate-card">
                        <img src="{{URL::asset('Uploads/Users/'.$candidate->photo)}}" class="card-img-top candidate-img" alt="{{ $candidate->name }}">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $candidate->name }}</h5>
                            <form action="{{ route('vote.submit', $candidate->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100">Vote</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No candidates available for voting at this time.</p>
                </div>
            @endforelse
        </div>
        <!-- Pagination -->
            <div class="mt-4">
                {{ $candidates->links() }}
            </div>
    </div>
    </div>



    <!-- ======Footer========== -->
    <footer class="footer bg-dark text-white text-center py-3">
        <div class="container">
            <p class="mb-0">© 2025 Orevan Voting System. All rights reserved.</p>
            <p class="mb-0">Contact us: info@orevan.com | Terms & Privacy</p>
        </div>
    </footer>
</div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
