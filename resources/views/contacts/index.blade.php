@extends('master')

@section('content')
<div class="contact-manager">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 d-flex mb-3 justify-content-between">
                <a href="{{ route('contacts.index') }}" class="btn btn-info">All Contacts</a>
                <a href="{{ route('contacts.create') }}" class="btn btn-primary">Create New Contact</a>
            </div>
            <hr>
            <div class="col-md-12">
                <!-- Display Success Message -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="form d-flex" method="GET" action="{{ route('contacts.index') }}">
                    <input type="text" class="form-control" name="search" placeholder="Search by name or email">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th><a href="{{ route('contacts.index', ['sort' => 'name', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Name</a></th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th><a href="{{ route('contacts.index', ['sort' => 'created_at', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Created At</a></th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->address }}</td>
                            <td>{{ $contact->created_at }}</td>
                            <td>
                                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are You Sure?')" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
