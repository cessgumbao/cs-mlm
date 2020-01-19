<div id="add_product" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h6> Product </h6>
        {!! Form::open(['url' => '']) !!}
        <div class="file-field input-field">
            <div class="btn">
                <span>Upload Image</span>
                {!! Form::file('product_image', ['accept' => 'image/*']) !!}
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="input-field">
            {!! Form::text('product_name', null, ['class' => 'validate']) !!}
            <label for="product_name">Product Name</label>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="modal-footer">
        <a href="#!" class="create_product modal-close waves-effect waves-green btn-flat">Create</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
</div>