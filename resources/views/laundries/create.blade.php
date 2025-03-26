<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>
    <div class="d-flex justify-content-center align-items-center min-vh-100" 
         style="background: linear-gradient(to right, #6a11cb, #2575fc);">
        <div class="card shadow-lg p-4 rounded-4" style="width: 500px;">
            <div class="card-header bg-primary text-white text-center rounded-3">
                <h4 class="mb-0 fw-bold">Laundry Application</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('laundry.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="user_name" class="form-label fw-bold">Name:</label>
                        <input type="text" id="user_name" name="user_name" class="form-control shadow-sm rounded-3" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label fw-bold">Role:</label>
                        <select id="role" name="role" class="form-select shadow-sm rounded-3" required>
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                        </select>
                        <span class="text-danger small">*If you are a teacher, the total price will be 20% off!</span>
                    </div>

                    <div class="mb-3">
                        <label for="units" class="form-label fw-bold">Laundry Units (1 unit = 5kg):</label>
                        <input type="number" id="units" name="units" class="form-control shadow-sm rounded-3" min="1" value="1" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tags:</label>
                        <div class="d-flex flex-wrap">
                            @foreach($tags as $tag)
                            <div class="form-check me-3">
                                <input type="checkbox" id="tag_{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}" class="form-check-input tag-checkbox" data-price="0.5">
                                <label for="tag_{{ $tag->id }}" class="form-check-label">{{ $tag->name }} (+$0.5)</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-text">Select applicable tags for your laundry.</div>
                    </div>

                    <div class="mb-3">
                        <h5>Total Price: <span id="total-price" class="fw-bold text-primary">$4.00</span></h5>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                            <i class="fa-solid fa-paper-plane me-2"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const basePrice = 4.00; // 5kg以下の基本料金
        const extraPricePerUnit = 4.00; // 5kgごとの追加料金
        const unitSize = 5; // 1ユニット (kg)
        const tagPrice = 0.50; // タグ1つにつき $0.5
        const discountRate = 0.20; // teacher の割引率（20%）

        const unitsInput = document.getElementById("units");
        const roleSelect = document.getElementById("role");
        const checkboxes = document.querySelectorAll(".tag-checkbox");
        const totalPriceElement = document.getElementById("total-price");

        function calculateTotalPrice() {
            let units = parseInt(unitsInput.value) || 1; // 最低1ユニット
            let weightPrice = basePrice;

            // 重量による価格計算
            if (units > unitSize) {
                let extraUnits = Math.ceil(units / unitSize) - 1; // 5kgごとの超過回数
                weightPrice = basePrice + (extraUnits * extraPricePerUnit);
            }

            // タグ料金計算
            let tagCost = 0;
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    tagCost += parseFloat(checkbox.dataset.price);
                }
            });

            // 合計料金を計算
            let totalPrice = weightPrice + tagCost;

            // role が teacher なら 20% 割引適用
            if (roleSelect.value === "teacher") {
                totalPrice *= (1 - discountRate);
            }

            totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`;
        }

        // 入力イベントを監視してリアルタイムで価格を更新
        unitsInput.addEventListener("input", calculateTotalPrice);
        roleSelect.addEventListener("change", calculateTotalPrice);
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("change", calculateTotalPrice);
        });

        // 初期計算
        calculateTotalPrice();
    });
</script>
