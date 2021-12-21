<div class="col-lg-6">
    <div class="package-item box-item">
        <div class="package-image">
            <img src="{{ asset('storage/'.$company->picture) }}" alt="Image">
        </div>
        <div class="package-content">
            <h4>{{ $company->name_company ?? "" }}</h4>
            <div class="package-price">
                <p><span>Tel</span> / {{ $company->phone_number ?? "" }} </p>
            </div>
            <p>{{ $company->description ?? "Une breve description de cette company" }}</p>
            <div class="package-info">
                <a
                    href="{{ route('company.detail',$company->name_company) }}"
                    class="btn-blue btn-red btn-style-1"
                >View more details</a>
            </div>
        </div>
    </div>
</div>
