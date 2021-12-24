{!! form_start($form) !!}
<div class="row gy-4">
    <div class="col-md-12 col-lg-12">
        <div class="form-group">
            <div class="form-control-wrap">
                {!! form_row($form->name_town) !!}
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
