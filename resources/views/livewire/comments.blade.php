<div>
    <div class="mt-5 m-0 px-3 px-sm-5">
        <div class="ml-lg-5 mb-4">
            <h5>Comments</h5>
        </div>
        <form wire:submit.prevent="handleSubmit({{ $product_id }})" class="ml-lg-5">
            <textarea wire:model="comment" rows="3" class="form-control" wire:click="checkAuth({{ $product_id  }})"></textarea>
            @error('comment') <div class="error mt-2">{{ $message }}</div> @enderror
            <button type="submit" class="btn btn-primary mt-3" >Post Comment</button>
        </form>
    </div>
    <div class="ml-lg-5">
        @include("products.productsDetails.Comments")
    </div>
</div>

