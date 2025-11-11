<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Product List</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

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

  <!-- Pagination summary + links -->
  <div class="d-flex justify-content-between align-items-center mt-3">
    <div>
      Showing {{ $products->firstItem() ?? 0 }} to {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products
    </div>
    <div>
      {{ $products->links() }}
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
