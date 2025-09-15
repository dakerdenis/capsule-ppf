<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.add_post_product') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="product_codes" class="form-label">Enter Product Codes (One per line)</label>
                <textarea class="form-control" id="product_codes" name="product_codes" rows="10" placeholder="Paste product codes here..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Products</button>
        </form>
    </div>
</div>