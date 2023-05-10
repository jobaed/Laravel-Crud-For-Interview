@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{-- User Registration Card --}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>Add User </div>
                        {{-- All User Page Button  --}}
                        <div><a href="{{ route('userInfos') }}" class="btn btn-sm btn-primary">All User</a></div>
                    </div>
                    <div class="card-body">
                        {{-- User Registration Form --}}
                        {{-- And Hit store route --}}
                        <form method="POST" action="{{ route('userInfos.store') }}">
                            {{-- Csrf Token For Secure Auth --}}
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="name" class="form-control" name="name" id="name"
                                    placeholder="Enter Your Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="email" placeholder="Enter Email Address" required>
                            </div>
                            <div class="row">
                                <div class="col md-6">
                                    <div class="mb-3">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country" id="country"
                                            placeholder="Enter Your Country" required>
                                    </div>
                                </div>
                                <div class="col md-6">
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" name="city" id="city"
                                            placeholder="Enter Your City" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col md-6">
                                    <div class="mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" class="form-control" name="state" id="state"
                                            placeholder="Enter Your state" required>
                                    </div>
                                </div>
                                <div class="col md-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            placeholder="Enter Your address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name='phone' id="phone"
                                        placeholder="Enter Your phone" required>
                                </div>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            {{-- SUbmit Button --}}
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
