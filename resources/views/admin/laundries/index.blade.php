<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>
    <div class="d-flex justify-content-center align-items-start min-vh-100 py-5 px-4"
         style="background: linear-gradient(to right, #6a11cb, #2575fc);">
        <div class="container bg-white shadow-lg rounded-4 p-4 w-100">
            <h1 class="h3 mb-4 text-dark fw-bold text-center">Laundry Management</h1>

            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center">
                    <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Units</th>
                            <th>Pickup Code</th>
                            <th>Tags</th>
                            <th>Applied At</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laundries as $laundry)
                        <tr>
                            <td>{{ $laundry->id }}</td>
                            <td>{{ $laundry->user_name }}</td>
                            <td>{{ ucfirst($laundry->role) }}</td>
                            <td>{{ $laundry->units }}</td>
                            <td class="fw-bold">{{ $laundry->pickup_code }}</td>
                            <td>
                                @foreach($laundry->tags as $tag)
                                    <span class="badge bg-info text-dark m-1">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $laundry->created_at->format('Y-m-d H:i') }}</td>
                            <td>${{ number_format(4 + max(0, ceil($laundry->units / 5) - 1) * 4 + count($laundry->tags) * 0.5, 2) }}</td>
                            <td>
                                <span class="badge 
                                    {{ $laundry->status == 'pending' ? 'bg-warning text-dark' : 'bg-success' }}">
                                    {{ ucfirst($laundry->status) }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('admin.laundries.update-status', $laundry->id) }}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <select name="status" class="form-select">
                                            <option value="pending" {{ $laundry->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="completed" {{ $laundry->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-sync-alt"></i> Update
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- ページネーション -->
            <div class="d-flex justify-content-center mt-4">
                {{ $laundries->links() }}
            </div>
        </div>
    </div>
</x-app-layout>