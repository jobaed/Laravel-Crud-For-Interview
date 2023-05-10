@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>User Informations</h4>
                        {{-- Add User Page Button --}}
                        <div><a href="{{ route('userInfos.create') }}" class="btn btn-sm btn-primary">Add User</a></div>
                    </div>

                    {{-- All User Data Table  --}}
                    <div class="card-body">

                        {{-- Displaying Messages --}}
                        @if (session()->has('message'))
                            <div class="alert alert-primary" role="alert">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        {{-- Data Table --}}
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">City</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Phone</th>
                                    <th> Actions </th>
                                </tr>
                            </thead>

                            {{-- Make Loop For Showing All Data --}}
                            @foreach ($allUsers as $user)
                                <tr>
                                    @php
                                        // Decode Data To array For Displaying
                                        $other_inf = json_decode($user->other_info);
                                    @endphp
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $other_inf->country }}</td>
                                    <td>{{ $other_inf->city }}</td>
                                    <td>{{ $other_inf->state }}</td>
                                    <td>{{ $other_inf->address }}</td>
                                    <td>{{ $other_inf->phone }}</td>
                                    <td>
                                        {{-- Delete Form To delete data --}}
                                        <form action="{{ route('userInfos.destroy', $user->id) }}" method="post">
                                            {{-- Csrf For Secure auth --}}
                                            @csrf

                                            {{-- There is delete method IT's definde that's delete form --}}
                                            @method('delete')

                                            {{-- Delete Buttn With Id --}}
                                            <button class="btn btn-sm btn-danger me-1"><i
                                                    class="fa-solid fa-trash"></i></button>

                                            {{-- Edit Button with id --}}
                                            <a href="{{ route('userInfos.edit', $user->id) }}"
                                                class="btn btn-sm btn-info"><i class="fa-solid fa-pen"></i></a>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            <tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
