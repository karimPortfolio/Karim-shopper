
@extends("Master_page")
@section("title" , "Thank you | Karim Shopper")
@section('content')
      <div class="thankyou py-5 mt-5">
           <div class="content">
               <div class="firs_part d-flex justify-content-center align-items-center">
                   <i class="fas fa-check-circle text-success"></i>
               </div>
               <div class="second_part mt-4">
                     <h1 class="text-success text-center">Thank you!</h1>
                     <h5 class="text-center mt-4">Payment Done Successfuly</h5>
                     <p class="text-center my-4">Thank you! your products will be ship to you very soon <br> you can check your product status in your dashboard. </p>
                     <div class="d-flex justify-content-center align-items-center">
                        <a href="/dashboard" class="btn btn-success d-flex justify-content-center align-items-center">Go to dashboard</a>
                     </div>
               </div>
           </div>
      </div>
@endsection
