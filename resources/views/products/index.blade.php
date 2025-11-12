<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Product List</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }

    /* Better looking dropdown */
    .form-select-sm {
      border-radius: 8px;
      padding: 4px 28px 4px 10px; /* add space on the right for arrow */
      background-position: right 8px center; /* move arrow slightly left */
      background-repeat: no-repeat;
      background-size: 12px 12px; /* smaller arrow */
    }

    /* Layout styling */
    .pagination-area {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      gap: 1.5rem;
      margin-top: 1.5rem;
    }

    .per-page-form {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .per-page-form span {
      margin-left: 0.75rem;
    }

    .pagination-controls {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      flex-wrap: wrap;
      justify-content: center;
    }

    /* Optional: smoother dropdown look */
    select.form-select-sm:focus {
      box-shadow: 0 0 0 0.15rem rgba(13,110,253,0.25);
      outline: none;
    }
  </style>
</head>

<body>
<div class="container py-4">
  <h1 class="mb-4 text-center">Product List</h1>

  <div class="card shadow-sm">
    <div class="card-body p-0">
      <table class="table table-striped table-hover mb-0">
        <thead class="table-light">
          <tr class="text-center">
            <th>ID</th>
            <th>Name</th>
            <th>Price ($)</th>
            <th>Stock</th>
            <th>SKU</th>
            <th>Created At</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($products as $product)
            <tr class="text-center">
              <td>{{ $product->id }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ number_format($product->price, 2) }}</td>
              <td>{{ $product->stock }}</td>
              <td>{{ $product->sku }}</td>
              <td>{{ $product->created_at->format('Y-m-d') }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center text-muted py-3">No products found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Pagination & Controls -->
  <div class="pagination-area">

    <!-- Left: per-page selector -->
    <form method="GET" class="per-page-form">
      <label for="per_page" class="fw-semibold">Show:</label>
      <select name="per_page" id="per_page" class="form-select form-select-sm w-auto"
          onchange="this.form.submit()">
        <option value="5"  {{ $perPage == 5 ? 'selected' : '' }}>5</option>
        <option value="10"  {{ $perPage == 10 ? 'selected' : '' }}>10</option>
        <option value="15" {{ $perPage == 15 ? 'selected' : '' }}>15</option>
        <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
      </select>
      <span class="text-muted small">per page (of {{ $products->total() }})</span>
    </form>

    <!-- Middle: modern centered pagination (new) -->
    <div class="pagination-controls">

      <nav aria-label="Products pagination">
        <ul class="pagination pagination-sm mb-0 align-items-center">
          <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
            @if($products->onFirstPage())
              <span class="page-link rounded-pill d-flex align-items-center gap-2" aria-disabled="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L6.707 7l4.647 4.646a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 0 1 .708 0z"/></svg>
                Prev
              </span>
            @else
              <a class="page-link rounded-pill d-flex align-items-center gap-2" href="{{ request()->fullUrlWithQuery(['page' => $products->currentPage() - 1, 'per_page' => $perPage]) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L6.707 7l4.647 4.646a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 0 1 .708 0z"/></svg>
                Prev
              </a>
            @endif
          </li>

          <li class="page-item mx-2 d-none d-sm-inline-flex">
            <span class="page-link border-0 bg-transparent small text-muted">
              Page <strong class="mx-1">{{ $products->currentPage() }}</strong> of {{ $products->lastPage() }}
            </span>
          </li>

          <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
            @if($products->hasMorePages())
              <a class="page-link rounded-pill d-flex align-items-center gap-2" href="{{ request()->fullUrlWithQuery(['page' => $products->currentPage() + 1, 'per_page' => $perPage]) }}">
                Next
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 14.354a.5.5 0 0 1 0-.708L9.293 9 4.646 4.354a.5.5 0 1 1 .708-.708l5 5a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708 0z"/></svg>
              </a>
            @else
              <span class="page-link rounded-pill d-flex align-items-center gap-2" aria-disabled="true">
                Next
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 14.354a.5.5 0 0 1 0-.708L9.293 9 4.646 4.354a.5.5 0 1 1 .708-.708l5 5a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708 0z"/></svg>
              </span>
            @endif
          </li>
        </ul>
      </nav>

      <!-- Compact 'Go to Page' form (keeps per_page param) -->
      <form method="GET" class="d-flex align-items-center gap-2">
        <input type="hidden" name="per_page" value="{{ $perPage }}">
        <label class="small text-muted mb-0">Jump to</label>
        <input type="number" name="page" min="1" max="{{ $products->lastPage() }}" value="{{ $products->currentPage() }}" class="form-control form-control-sm" style="width:90px">
        <button type="submit" class="btn btn-primary btn-sm">Go</button>
      </form>
    </div>

    {{--
      Original pagination block (kept for reference) --

      <!-- Middle: next/prev + go to page -->
      <div class="pagination-controls">

        <span class="small text-muted">Page {{ $products->currentPage() }} of {{ $products->lastPage() }}</span>

        @if($products->onFirstPage())
          <button class="btn btn-outline-secondary btn-sm" disabled>Previous</button>
        @else
          <a href="{{ $products->previousPageUrl() }}&per_page={{ $perPage }}" class="btn btn-outline-primary btn-sm">Previous</a>
        @endif

        @if($products->hasMorePages())
          <a href="{{ $products->nextPageUrl() }}&per_page={{ $perPage }}" class="btn btn-outline-primary btn-sm">Next</a>
        @else
          <button class="btn btn-outline-secondary btn-sm" disabled>Next</button>
        @endif

        <form method="GET" class="d-inline-flex align-items-center gap-2">
          <input type="hidden" name="per_page" value="{{ $perPage }}">
          <input type="number" name="page" min="1" max="{{ $products->lastPage() }}"
                value="{{ $products->currentPage() }}"
                class="form-control form-control-sm w-50 text-center">
          <button type="submit" class="btn btn-primary btn-sm">Go</button>
        </form>
      </div>
    --}}
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




 {{-- version 1 --}}
  <!-- Pagination and per-page selector -->

  {{-- <div class="d-flex flex-column align-items-center mt-4">

    <!-- Dropdown for per-page selection -->
    <form method="GET" class="mb-3">
      <div class="d-flex align-items-center gap-2">
        <label for="per_page" class="fw-semibold">Show:</label>
        <select name="per_page" id="per_page" class="form-select form-select-sm w-auto"
                onchange="this.form.submit()">
          <option value="5"  {{ $perPage == 5 ? 'selected' : '' }}>5</option>
          <option value="8"  {{ $perPage == 8 ? 'selected' : '' }}>8</option>
          <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
          <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
        </select>
        <span class="text-muted small">per page (out of {{ $products->total() }})</span>
      </div>
    </form>

    <!-- Pagination links -->
    <div>
      {{ $products->links() }}
    </div>

    <!-- Page info -->
    <div class="mt-2 small text-muted">
      Page {{ $products->currentPage() }} of {{ $products->lastPage() }}
    </div>
  </div> --}}
