@extends('layouts.main')

@section('content')
    <div class="container-lg" style="margin: 0 auto;">
        <div class="row mt-5">
            @foreach($departments as $department)
                <div class="col-lg-4 col-md4 col-sm-12 text-center mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $department->image }}" alt="Department Image" style="width: 200px; margin: 0 auto;"/>
                        <div class="card-body">
                            <div class="card-title">{{ $department->name }}</div>
                            <div class="card-text">{{ $department->description }}</div>
                            @include('components.appointment_form')
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
