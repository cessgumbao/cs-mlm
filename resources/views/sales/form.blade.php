<div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
        <h4>Modal Header</h4>
        <div class="input-field col s12">
            <input id="referral_code" type="text" name="referral_code" value="{{ old('referral_code') }}" autocomplete="referral_code" autofocus>
            <label for="referral_code" class="center-align">Referral Code</label>
            @error('referral_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
</div>