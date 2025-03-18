<div class="wishlist-container">
  <div class="row g-4">
    @foreach ($whishlistProducts as $product)
    <div class="col-md-6 col-lg-4">
      <div class="product-card">
      <div class="card-badges">
        <form action="{{route('dashboard.whishlist.delete', $product->id)}}" method="post" class="deleteProductForm">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn-remove text-white" aria-label="Remove from wishlist">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3"
          viewBox="0 0 16 16">
          <path
            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
          </svg>
        </button>
        </form>
      </div>

      <div class="image-wrapper">
        @if (!empty($product->image))
      <img class="product-img" src="{{asset('images/products/' . $product->image)}}"
      alt="{{$product->product_name}}">
    @else
    <img class="product-img" src="{{asset('images/products/imgplaceholder.png')}}" alt="Product image">
  @endif

        <div class="card-overlay">
        <a href="{{ route('products.details', $product->id) }}" class="action-btn view-btn"
          data-tooltip="Quick view">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye"
          viewBox="0 0 16 16">
          <path
            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
          </svg>
        </a>
        </div>
      </div>

      <div class="card-content">
        <h3 class="product-title">{{$product->product_name}}</h3>
        <div class="price-tag">${{$product->price}}</div>
        <a href="{{ route('products.details', $product->id) }}" class="details-btn">
        <span>View Details</span>
        <i class="bi bi-arrow-right"></i>
        </a>
      </div>
      </div>
    </div>
  @endforeach
  </div>

  @if(count($whishlistProducts) === 0)
    <div class="empty-wishlist">
    <div class="empty-icon">
      <i class="bi bi-heart"></i>
    </div>
    <h3>Your wishlist is empty</h3>
    <p>Products you love will appear here</p>
    <a href="{{ route('products') }}" class="browse-btn">Browse Products</a>
    </div>
  @endif
</div>

<style>
  :root {
    --primary: #4361ee;
    --primary-gradient: linear-gradient(135deg, #4361ee, #3a0ca3);
    --secondary: #f72585;
    --text-dark: #2b2d42;
    --text-light: #8d99ae;
    --light: #f8f9fa;
    --surface: #ffffff;
    --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.06);
    --shadow-md: 0 5px 15px rgba(0, 0, 0, 0.07);
    --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
    --radius-sm: 8px;
    --radius-md: 16px;
    --radius-lg: 24px;
    --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  }

  .wishlist-container {
    padding: 1.5rem 0;
  }

  .product-card {
    position: relative;
    background: var(--surface);
    border-radius: var(--radius-md);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  .product-card:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-5px);
  }

  .image-wrapper {
    position: relative;
    padding-top: 100%;
    background: #f5f7fa;
    overflow: hidden;
  }

  .product-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform 0.7s ease;
  }

  .product-card:hover .product-img {
    transform: scale(1.05);
  }

  .card-badges {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 10;
  }

  .btn-remove {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    color: var(--secondary);
    font-size: 1.1rem;
    cursor: pointer;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    backdrop-filter: blur(4px);
  }

  .btn-remove:hover {
    background: var(--secondary);
    color: white;
    transform: scale(1.1);
  }

  .card-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 1rem;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.3), transparent);
    display: flex;
    justify-content: center;
    opacity: 0;
    transform: translateY(20px);
    transition: var(--transition);
  }

  .product-card:hover .card-overlay {
    opacity: 1;
    transform: translateY(0);
  }

  .action-btn {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.95);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    box-shadow: var(--shadow-md);
    transition: var(--transition);
    position: relative;
  }

  .action-btn:hover {
    background: var(--primary);
    color: white;
    transform: translateY(-5px);
  }

  .action-btn:before {
    content: attr(data-tooltip);
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%) translateY(-5px);
    padding: 5px 10px;
    border-radius: 6px;
    background: rgba(0, 0, 0, 0.8);
    color: white;
    font-size: 12px;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: all 0.2s ease;
  }

  .action-btn:hover:before {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(-10px);
  }

  .card-content {
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }

  .product-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0rem !important;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .price-tag {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 1.2rem;
  }

  .details-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0.8rem 1.5rem;
    background: var(--primary-gradient);
    color: white;
    border-radius: var(--radius-sm);
    font-weight: 500;
    text-decoration: none;
    transition: var(--transition);
    gap: 8px;
    text-align: center;
  }

  .details-btn:hover {
    box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
    color: white;
  }

  .details-btn i {
    transition: transform 0.3s ease;
  }

  .details-btn:hover i {
    transform: translateX(4px);
  }

  .empty-wishlist {
    text-align: center;
    padding: 4rem 2rem;
    max-width: 500px;
    margin: 0 auto;
  }

  .empty-icon {
    font-size: 4rem;
    color: var(--text-light);
    margin-bottom: 1.5rem;
  }

  .empty-wishlist h3 {
    font-size: 1.6rem;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
  }

  .empty-wishlist p {
    color: var(--text-light);
    margin-bottom: 2rem;
  }

  .browse-btn {
    display: inline-block;
    padding: 0.8rem 2rem;
    background: var(--primary-gradient);
    color: white;
    border-radius: var(--radius-sm);
    font-weight: 500;
    text-decoration: none;
    transition: var(--transition);
  }

  .browse-btn:hover {
    box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
    transform: translateY(-3px);
    color: white;
  }

  @media (max-width: 768px) {
    .card-content {
      padding: 1.2rem;
    }

    .product-title {
      font-size: 1rem;
    }

    .price-tag {
      font-size: 1.2rem;
      margin-bottom: 1rem;
    }
  }
</style>