@extends('master')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">View Contact</h2>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Name:</dt>
                        <dd class="col-sm-9">{{ $contact->name }}</dd>

                        <dt class="col-sm-3">Email:</dt>
                        <dd class="col-sm-9">{{ $contact->email }}</dd>

                        <dt class="col-sm-3">Phone:</dt>
                        <dd class="col-sm-9">{{ $contact->phone }}</dd>

                        <dt class="col-sm-3">Address:</dt>
                        <dd class="col-sm-9">{{ $contact->address }}</dd>

                        <dt class="col-sm-3">Created At:</dt>
                        <dd class="col-sm-9">{{ $contact->created_at->format('F j, Y, g:i a') }}</dd>
                    </dl>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
