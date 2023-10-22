<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href=" {{ asset('css/main.css') }} ">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<title>Karim Shopper | {{ Auth::user()->name }}</title>

<x-app-layout>

    <div class="py-12">
        <div class="mx-auto">
                <h1 class="text-center" style="font-size: 50px;">Add new product</h1>

                <div class="my-5 d-flex justify-content-center align-items-center flex-column addProductDashboard">
                     <form action=" {{ route('dashboard.manageProducts.store') }}" method="post" enctype="multipart/form-data" accept="images/*" style="width: 500px" >
                         @csrf
                          <div >
                              <div class="mb-3">
                                  <label for="exampleInputEmail1"  class="form-label">Product name <span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Price <span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" name="price" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Discount</label>
                                  <input type="number" class="form-control" name="product_discount" id="exampleInputEmail1" placeholder="Example:20" aria-describedby="emailHelp">
                              </div>
                          </div>
                           <div class="mb-3 d-flex flex-column">
                              <label for="exampleInputEmail1" class="form-label">Category <span class="text-danger">*</span></label>
                              <select class="form-select form-select-lg mb-3" name="category" aria-label=".form-select-lg example">
                                <option selected value="Headphones&Accessories">Headphones & Accessories</option>
                                <option value="Smartpones&Tablets">Smartpones & Tablets</option>
                                <option value="Laptops&Consoles">Laptops & Consoles</option>
                              </select>
                          </div>
                          <div>
                              <input type="text"  style="display:none;" name="user_id" value={{Auth::user()->id}}>
                          </div>
                          <div class="mb-3">
                            <label for="">Image</label>
                            <br>
                            <label for="formFile" class="form-label btn btn-success d-flex justify-content-center align-items-center" style="height: 50px"><i class="fa-solid fa-image mr-3" style="font-size: 20px"></i>Add Product Image</label>
                            <input type="file" name="image" class="form-control d-none" id="formFile" >
                         </div>
                          <div>
                               <label for="">Description <span class="text-danger">*</span></label>
                               <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="4"></textarea>
                          </div>

                          <button type="submit" class="btn btn-success w-100 mt-5 btnAddProduct">Add Product</button>
                        </form>

                        <div class="handle_failed_messages pt-4">
                            @include('flashMessages.flash')
                        </div>

                </div>

        </div>
    </div>
</x-app-layout>
