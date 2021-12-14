{!! form_start($form) !!}
<div class="row gy-4">
    <div class="col-md-6 col-lg-6">
        <div class="form-group">
            <div class="form-control-wrap">
                {!! form_row($form->name_company) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="form-control-wrap">
                {!! form_row($form->picture) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="form-control-wrap">
                {!! form_row($form->address) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6">
        <div class="form-group">
            <div class="form-control-wrap">
                {!! form_row($form->phone_number) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="form-control-wrap">
                {!! form_row($form->email) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="form-control-wrap">
                {!! form_row($form->user_id) !!}
            </div>
        </div>
    </div>
</div>
<div class="form-group mt-3">
    <button type="submit" class="btn btn-primary btn-action">
        Enregistrer
    </button>
</div>
{!! form_end($form) !!}