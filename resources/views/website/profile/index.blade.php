@extends('layouts.app')

@section('title', 'پرفایل من')


@section('content')

    <div class="content">
        <section>
            <div class="bg-gradiant-account">
                <div class="area-shape-bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 260">
                        <polygon fill="currentColor" points="0,257 0,260 3000,260 3000,0"></polygon>
                    </svg>
                </div>
            </div>
        </section>
        <section class="mb-5 area-content-paccount">
            <div class="container">
                <div class="row">
                    @include('website.profile.sidebar')
                    <div class="col-12 col-lg-8">
                        <div class="tab-content tab-content-account-user " id="myTabContent">

                            <div class="tab-pane  active" id="content5" role="tabpanel" aria-labelledby="infoprofile-tab">
                                <div
                                    class="header-tab-content-account d-flex justify-content-between align-items-center mb-4">

                                    <h1 class="title-tabcontent-account">
                                        اطلاعات حساب

                                    </h1>

                                </div>

                                <form action="{{ route('profile.information.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-4">
                                            <label for="first_name">نام</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name"
                                                placeholder="نام"
                                                value="{{ auth()->user()->profile->first_name ?? old('first_name') }}">

                                            @error('first_name')
                                                <span class="invalid-feedback">
                                                    <strong class="text-danger">
                                                        {{ $error }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 mb-4">
                                            <label for="last_name">نام خانوادگی</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                placeholder="نام خانوادگی"
                                                value="{{ auth()->user()->profile->last_name ?? old('last_name') }}">
                                            @error('last_name')
                                                <span class="invalid-feedback">
                                                    <strong class="text-danger">
                                                        {{ $error }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 mb-4">
                                            <label for="last_name">شماره موبایل</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                placeholder="شماره موبایل"
                                                value="{{ auth()->user()->profile->last_name ?? old('last_name') }}">
                                            @error('last_name')
                                                <span class="invalid-feedback">
                                                    <strong class="text-danger">
                                                        {{ $error }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 mb-4">
                                            <label for="state">استان</label>
                                            <select name="province_id" id="province_id" class="form-control">
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}">
                                                        {{ $state->name }}</option>
                                                @endforeach

                                            </select>
                                            @error('province_id')
                                                <span class="invalid-feedback">
                                                    <strong class="text-danger">
                                                        {{ $error }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 mb-4">
                                            <label for="city_id">شهر</label>
                                            <select name="city_id" id="city_id" class="form-control">
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"> {{ $city->name }}</option>
                                                @endforeach

                                            </select>
                                            @error('city_id')
                                                <span class="invalid-feedback">
                                                    <strong class="text-danger">
                                                        {{ $error }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 mb-4">
                                            <label for="address">آدرس</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="ادرس"
                                                value="{{ auth()->user()->profile->address ?? old('address') }}">
                                            @error('address')
                                                <span class="invalid-feedback">
                                                    <strong class="text-danger">
                                                        {{ $error }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 mb-4">
                                            <label for="postal_code">کد پستی</label>
                                            <input type="text" class="form-control" id="postal_code" name="postal_code"
                                                placeholder="کد پستی"
                                                value="{{ auth()->user()->profile->postal_code ?? old('postal_code') }}">
                                            @error('postal_code')
                                                <span class="invalid-feedback">
                                                    <strong class="text-danger">
                                                        {{ $error }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-md-between align-items-center">

                                        <div class="area-btn-save">
                                            <button type="submit" class="btn btn-5"> ذخیره تغییرات<i
                                                    class="far fa-sd-card mr-2"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

@endsection
