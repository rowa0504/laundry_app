<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>
    <div class="d-flex justify-content-center align-items-center min-vh-100" 
         style="background: linear-gradient(to right, #6a11cb, #2575fc);">
        <div class="card shadow-lg p-4 rounded-4 text-center" style="width: 450px;">
            <div class="card-header bg-success text-white rounded-3">
                <h4 class="mb-0 fw-bold">Pickup Your Laundry</h4>
            </div>
            <div class="card-body text-dark">
                @if(session('error'))
                    <div class="alert alert-danger d-flex align-items-center">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('error') }}
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success d-flex align-items-center">
                        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('laundry.pickup.process') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="pickup_code" class="form-label fw-bold">Enter Pickup Code:</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fa-solid fa-key"></i></span>
                            <input type="number" id="pickup_code" name="pickup_code" 
                                   class="form-control text-center fs-5 border-success" 
                                   maxlength="6" pattern="\d{6}" required>
                        </div>
                        <div class="form-text">Enter the 6-digit pickup code provided during application.</div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg rounded-pill shadow-sm">
                            <i class="fa-solid fa-box-open me-2"></i> Pickup your Laundry
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
