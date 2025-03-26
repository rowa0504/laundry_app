<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>
    <div class="d-flex justify-content-center align-items-center min-vh-100" 
         style="background: linear-gradient(to right, #6a11cb, #2575fc);">
        <div class="card shadow-lg p-4 rounded-4 text-center" style="width: 450px;">
            <div class="card-header bg-success text-white rounded-3">
                <h4 class="mb-0 fw-bold">Laundry Application Submitted</h4>
            </div>
            <div class="card-body text-dark">
                <p class="fs-5">Thank you for using our service!<br>
                Your Total Price is <span class="fw-bold">${{ number_format($laundry->price, 2) }}</span>
                </p>
                <p class="fs-4 fw-bold text-primary">Pickup Code: 
                    <span class="badge bg-danger fs-3 px-3 py-2">{{ $laundry->pickup_code }}</span>
                </p>
                <a href="{{ route('dashboard') }}" class="btn btn-success btn-lg rounded-pill shadow-sm mt-3">
                    <i class="fa-solid fa-house me-2"></i> Back to Home
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
