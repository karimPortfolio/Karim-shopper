

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<div class="py-5 all_orders">

    <table class="table table-bordered">
        <thead >
          <tr>
            <th scope="col">Full name</th>
            <th scope="col">Phone</th>
            <th scope="col">City</th>
            <th scope="col">Country</th>
            <th scope="col">Payment mode</th>
            <th scope="col">Order status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($userOrders as $order)
                <tr>
                      <td class="p-3">
                          <h5 class="m-0"> {{ $order->fullname }} </h5>
                      </td>
                      <td class="p-3"> <p class="m-0" >{{ $order->phone }}</p> </td>
                      <td class="p-3"> <p class="m-0" >{{ $order->city }}</p> </td>
                      <td class="p-3"> <p class="m-0" >{{ $order->country }}</p> </td>
                      <td class="p-3"> <p class="m-0" >{{ $order->payment_mode }}</p> </td>
                      <td class="p-3"> <span class="badge badge-pill badge-warning m-0">{{ $order->status_message }}</span> </td>
                </tr>
            @endforeach
        </tbody>
      </table>

</div>


