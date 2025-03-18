

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<div class="pt-3 all_orders">
  {{-- <div class="card p-0 shadow-none">
    <div class="card-header bg-white">
      <h4 class="mb-0 text-primary font-weight-bold">Customer Orders</h4>
    </div> --}}
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">Full name</th>
              <th scope="col" class="border-0">Phone</th>
              <th scope="col" class="border-0">City</th>
              <th scope="col" class="border-0">Country</th>
              <th scope="col" class="border-0">Payment mode</th>
              <th scope="col" class="border-0">Order status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($userOrders as $order)
              <tr class="border-left-0 border-right-0">
                <td class="py-3">
                  <h6 class="mb-0 font-weight-bold">{{ $order->fullname }}</h6>
                </td>
                <td class="py-3">{{ $order->phone }}</td>
                <td class="py-3">{{ $order->city }}</td>
                <td class="py-3">{{ $order->country }}</td>
                <td class="py-3">
                  <span class="text-muted">{{ $order->payment_mode }}</span>
                </td>
                <td class="py-3">
                  @if($order->status_message == 'completed')
                    <span class="badge badge-pill badge-success">{{ $order->status_message }}</span>
                  @elseif($order->status_message == 'pending')
                    <span class="badge badge-pill badge-warning">{{ $order->status_message }}</span>
                  @elseif($order->status_message == 'cancelled')
                    <span class="badge badge-pill badge-danger">{{ $order->status_message }}</span>
                  @else
                    <span class="badge badge-pill badge-info">{{ $order->status_message }}</span>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  {{-- </div> --}}
  
  <style>
    .all_orders .card {
      border-radius: 10px;
      overflow: hidden;
      max-width: 100%;
      transition: all 0.3s ease;
    }
    .all_orders .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .all_orders .table th {
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    .all_orders .badge {
      padding: 8px 12px;
      font-weight: 500;
    }
    .all_orders tbody tr {
      transition: background 0.2s ease;
    }
    .all_orders tbody tr:hover {
      background-color: #f8f9fa;
    }
  </style>
</div>


