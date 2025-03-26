<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>

<x-app-layout>
    <div class="d-flex justify-content-center align-items-center min-vh-100" 
         style="background: linear-gradient(to right, #4facfe, #00f2fe);">
        <div class="bg-white shadow-lg rounded-4 p-5 text-center" style="max-width: 500px;">
            <h1 class="h3 fw-bold text-primary">
                <i class="fa-solid fa-jug-detergent"></i> Welcome to our Laundry Service!
            </h1>
            <p class="text-muted mb-4">Fast & Reliable Laundry Services for You</p>
            
            <div x-data="{ loadingDeposit: false, loadingReceive: false }">
                <!-- 預けるボタン -->
                <a href="{{ route('laundry.create') }}" 
                   @click="loadingDeposit = true" 
                   class="btn btn-primary btn-lg w-100 mb-3 rounded-pill shadow-sm position-relative">
                    <span x-show="!loadingDeposit" class="fw-bold">Get Laundry Service</span>
                    <span x-show="loadingDeposit" class="fw-bold">Processing...</span>
                    <i class="fa-solid fa-spinner fa-spin position-absolute end-0 pe-3" x-show="loadingDeposit"></i>
                </a>

                <!-- 受け取るボタン -->
                <a href="{{ route('laundry.pickup') }}" 
                   @click="loadingReceive = true" 
                   class="btn btn-success btn-lg w-100 rounded-pill shadow-sm position-relative">
                    <span x-show="!loadingReceive" class="fw-bold">Pickup your Laundry</span>
                    <span x-show="loadingReceive" class="fw-bold">Processing...</span>
                    <i class="fa-solid fa-spinner fa-spin position-absolute end-0 pe-3" x-show="loadingReceive"></i>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
