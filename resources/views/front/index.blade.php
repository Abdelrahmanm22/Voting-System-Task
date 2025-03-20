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
                <button class="btn btn-outline-custom" type="button">
                    Logout
                </button>
            </div>
        </div>
    </nav>


    <!-- ====Main Content==== -->
    <div class="content">
        <div class="container my-5">
        <h1 class="text-center mb-4">Vote for Your Candidate</h1>
        <div class="row row-cols-1 row-cols-md-3">
            <div class="col">
                <div class="card candidate-card">
                    <img src="{{URL::asset('front/assets/img/abdelrahman.jpg')}}" class="card-img-top candidate-img" alt="Candidate">
                    <div class="card-body">
                        <h5 class="card-title text-center">Abdo</h5>
                        <button class="btn btn-primary w-100">Vote</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card candidate-card">
                    <img src="{{URL::asset('front/assets/img/abdelrahman.jpg')}}" class="card-img-top candidate-img" alt="Candidate">
                    <div class="card-body text-center">
                        <h5 class="card-title">Abdo</h5>
                        <button class="btn btn-primary w-100">Vote</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card candidate-card">
                    <img src="{{URL::asset('front/assets/img/abdelrahman.jpg')}}" class="card-img-top candidate-img" alt="Candidate">
                    <div class="card-body text-center">
                        <h5 class="card-title">Abdo</h5>
                        <button class="btn btn-primary w-100">Vote</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
    </div>



    <!-- ======Footer========== -->
    <footer class="footer bg-dark text-white text-center py-3">
        <div class="container">
            <p class="mb-0">© 2025 Orevan Voting System. All rights reserved.</p>
            <p class="mb-0">Contact us: info@votingsystem.com | Terms & Privacy</p>
        </div>
    </footer>
</div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
