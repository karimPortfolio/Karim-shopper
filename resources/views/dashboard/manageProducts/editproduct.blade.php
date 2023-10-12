<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href=" {{ asset('css/main.css') }} ">
<title>Karim Shopper | {{ Auth::user()->name }}</title>
<x-app-layout>

    <div class="py-12">
        <div class="mx-auto editing_products_panel">

                <h1 class="text-center text-success" style="font-size: 30px;">Edit Product {{ $product->product_name }} </h1>

                <div class="d-flex">

                   <div class="product_image my-5 d-none d-lg-flex justify-content-center align-items-start col-lg-5">
                        <img src="{{ asset("images/products/$product->image") }}" alt="">
                   </div>

                    <div class="my-5 col-lg-7 d-flex justify-content-center align-items-center addProductDashboard">
                        <form action=" {{ route('dashboard.manageProducts.updateproduct' , $product->id) }}" method="post" enctype="multipart/form-data" accept="images/*" style="width: 500px" >
                             @csrf
                             <div >
                                 <div class="mb-3">
                                     <label for="exampleInputEmail1"  class="form-label">Product name</label>
                                     <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                                 </div>
                                 <div class="mb-3">
                                     <label for="exampleInputEmail1" class="form-label">Price</label>
                                     <input type="text" class="form-control" name="price" value=" {{ $product->price }} " id="exampleInputEmail1" aria-describedby="emailHelp">
                                 </div>
                                 <div class="mb-3">
                                   <label for="exampleInputEmail1" class="form-label">Discount</label>
                                   <input type="text" class="form-control" name="product_discount" id="exampleInputEmail1" value = " {{ $product->product_discount }} " aria-describedby="emailHelp">
                               </div>
                             </div>
                              <div class="mb-3 d-flex flex-column">
                                 <label for="exampleInputEmail1" class="form-label">Category</label>
                                 <select class="form-select form-select-lg mb-3" name="category" value = " {{ $product->category }} " aria-label=".form-select-lg example">
                                   <option value="Headphones&Accessories">Headphones & Accessories</option>
                                   <option value="Smartpones&Tablets">Smartpones & Tablets</option>
                                   <option value="Laptops&Consoles">Laptops & Consoles</option>
                                 </select>
                             </div>
                             <div>
                                 <input type="text"  style="display:none;" name="user_id" value={{ $product->user_id }}>
                             </div>
                             <div class="mb-3">
                               <label for="">Image</label>
                               <br>
                               <label for="formFile" class="form-label btn btn-success d-flex justify-content-center align-items-center" style="height: 50px"><i class="fa-solid fa-image mr-3" style="font-size: 20px"></i>Add Product Image</label>
                               <input type="file" name="image" class="form-control d-none" id="formFile" value=" {{ $product->image }} " >
                            </div>
                             <div>
                                 <label for="" class="form-label">Description</label>
                                  <input class="form-control" value=" {{ $product->description }} " id="exampleFormControlTextarea1" name="desc" ></input>
                             </div>

                             <button type="submit" class="btn btn-success w-100 mt-5 btnAddProduct">Edit</button>
                           </form>
                   </div>
                </div>

        </div>
    </div>
</x-app-layout>
