@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        {{-- This User Data Editing --}}
                        <div>{{ $userData->name }}'s Data Edit </div>

                        {{-- ALl User Show Button --}}
                        <div><a href="{{ route('userInfos') }}" class="btn btn-sm btn-primary">All User</a></div>
                    </div>
                    <div class="card-body">
                        @php
                        // Json Data Decoad To array For display
                            $other_infos = json_decode(old('other_info', $userData->other_info));
                            
                        @endphp
                        <form method="POST" action="{{ route('userInfos.update', $userData->id) }}">
                            {{-- Csrf Token For Secure AUth --}}
                            @csrf

                            {{-- There is put method. Its defined That's update form --}}
                            @method('put')


                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="name" class="form-control" name="name" id="name"
                                    placeholder="Enter Your Name" value="{{ old('name', $userData->name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    value="{{ old('email', $userData->email) }}" aria-describedby="emailHelp" name="email"
                                    placeholder="Enter Email Address" required>
                            </div>

                            <div class="row">
                                <div class="col md-6">
                                    <div class="mb-3">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" class="form-control" value="{{ $other_infos->country }}"
                                            name="country" id="country" placeholder="Enter Your Country" required>
                                    </div>
                                </div>
                                <div class="col md-6">
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" value="{{ $other_infos->city }}"
                                            name="city" id="city" placeholder="Enter Your City" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col md-6">
                                    <div class="mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" class="form-control" value="{{ $other_infos->state }}"
                                            name="state" id="state" placeholder="Enter Your state" required>
                                    </div>
                                </div>
                                <div class="col md-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" value="{{ $other_infos->address }}"
                                            name="address" id="address" placeholder="Enter Your address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" value="{{ $other_infos->phone }}"
                                        name='phone' id="phone" placeholder="Enter Your phone" required>
                                </div>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            {{-- Submit Button --}}
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
