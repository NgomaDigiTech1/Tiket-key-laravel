<div class="row">
    <div class="col-lg-4 col-md-12">
        <div class="table_item">
            <div class="form-group">
                <select name="depart" id="depart" class="form-control">
                    <option value="0">Depart</option>
                    @foreach($towns as $town)
                        <option value="{{ $town->name_town }}">{{ $town->name_town ?? "" }}</option>
                    @endforeach
                </select>
                <i class="flaticon-maps-and-flags"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="table_item">
            <div class="form-group">
                <select name="arriver" id="arriver" class="form-control">
                    <option value="0">Arriver</option>
                    @foreach($towns as $town)
                        <option value="{{ $town->name_town }}">{{ $town->name_town ?? "" }}</option>
                    @endforeach
                </select>
                <i class="flaticon-maps-and-flags"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="table_item">
            <div class="search">
                <button type="submit" class="btn-blue btn-red btn-style-1">SEARCH</button>
            </div>
        </div>
    </div>
</div>
