@extends('layouts.other')

@section('content')
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>{{ $trajet->company->name_company }}</h2>
                <h4 class="white">{{ $trajet->company->email }}</h4>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('company.index') }}">Companies</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail page</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>

    <section class="car-destinations">
        <div class="container">
            <div class="row">
                <div id="content" class="col-lg-8">
                    <div class="detail-content">
                        <div class="description detail-box car-book">
                            <div class="detail-title"><h3>YOUR PERSONAL INFORMATION</h3></div>
                            <div class="description-content">
                                <form>
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Name:</label>
                                            <input type="text" class="form-control" id="Name" placeholder="Enter full name">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" id="email" placeholder="abc@xyz.com">
                                        </div>
                                        <div class="form-group col-lg-6 col-left-padding">
                                            <label>Phone Number:</label>
                                            <input type="text" class="form-control" id="phnumber" placeholder="XXXX-XXXXXX">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Gender:</label>
                                            <select>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-left-padding">
                                            <label>Nationality:</label>
                                            <select>
                                                <option value="american">American</option>
                                                <option value="opel">Malaysian</option>
                                                <option value="audi">German</option>
                                            </select>
                                        </div>
                                        <div class="form-group textarea col-lg-12">
                                            <label>Message:</label>
                                            <textarea placeholder="Enter a message"></textarea>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Coupon Code:</label>
                                            <input type="text" class="form-control" id="Name" placeholder="Enter full name">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="checkbox-outer">
                                                <input type="checkbox" name="vehicle2" value="Car"> I want to receive <a href="#">Let’s car rent</a> promotional offers in the future terms and conditions.
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <a href="#"></a>
                        <div class="comment-btn">
                            <a href="#"></a>
                            <a href="#" class="btn-blue btn-red">Complete Booking</a>
                        </div>
                    </div>
                </div>

                <div id="sidebar" class="col-lg-4">
                    <aside class="detail-sidebar sidebar-wrapper">
                        <div class="sidebar-item sidebar-helpline">
                            <div class="sidebar-helpline-content">
                                <h3>Any Questions?</h3>
                                <p>Lorem ipsum dolor sit amet, consectet ur adipiscing elit, sedpr do eiusmod tempor incididunt ut.</p>
                                <p><i class="flaticon-phone-call"></i> (012)-345-6789</p>
                                <p><i class="flaticon-mail"></i> <span class="__cf_email__" data-cfemail="384c574d4a564c4a594e5d54784c5d4b4c55595154165b5755">[email&nbsp;protected]</span></p>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
