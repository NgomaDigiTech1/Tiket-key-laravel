{!! form_start($form) !!}
<div class="row gy-4">
    <div class="col-md-6 col-lg-6">
        <div class="form-group">
            <div class="form-control-wrap">
                {!! form_row($form->name) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="form-control-wrap">
                {!! form_row($form->first_name) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="form-control-wrap">
                {!! form_row($form->email) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="form-control-wrap">
                {!! form_row($form->birthdays) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6">
        <div class="form-group">
            <div class="form-control-wrap">
                {!! form_row($form->picture) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="form-control-wrap">
                {!! form_row($form->phone_number) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="form-control-wrap">
                {!! form_row($form->password) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="form-control-wrap">
                {!! form_row($form->role_id) !!}
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
