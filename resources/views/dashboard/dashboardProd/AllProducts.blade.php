<div class="container-fluid py-4">
  <div class="row g-4">
    @foreach ($userProducts as $product)
      <div class="col-md-6 col-lg-4 col-xl-3">
        <div class="product-card h-100">
          <div class="product-badge">New</div>
          <div class="product-image">
            @if (!empty($product->image))
              <img src="{{asset('images/products/'.$product->image)}}" alt="{{ $product->product_name }}">
            @else
              <img src="{{asset('images/products/imgplaceholder.png')}}" alt="Product placeholder">
            @endif
            
            <div class="product-actions">
              <a href="{{ route('dashboard.manageProducts.editproduct', $product->id) }}" class="action-btn edit-btn" title="Edit">
                <i class="bi bi-pencil-fill"></i>
                <span>Edit</span>
              </a>
              <form action="{{route('dashboard.manageProducts.delete',$product->id)}}" method="post" class="deleteProductForm">
                @method('DELETE')
                @csrf
                <button type="submit" class="action-btn delete-btn" title="Delete">
                  <i class="bi bi-trash3-fill"></i>
                  <span>Delete</span>
                </button>
              </form>
              <a href="{{ route('products.details',$product->id) }}" class="action-btn view-btn" title="View details">
                <i class="fas fa-eye"></i>
                <span>View</span>
              </a>
            </div>
          </div>
          
          <div class="product-info">
            <h5 class="product-title">{{ $product->product_name }}</h5>
            <div class="product-meta">
              <span class="product-price">${{ $product->price }}</span>
              <a href="{{ route('products.details',$product->id) }}" class="details-link">
                View Details <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  
  <div class="pagination-container">
    {{ $userProducts->onEachSide(1)->links('pagination::bootstrap-5') }}
  </div>
</div>
