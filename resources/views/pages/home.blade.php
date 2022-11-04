@extends('layouts.app')
@section('content')

  @include('includes.search')
  {{-- @include('includes.fillter') --}}
  
  <div class="container">
    @foreach ($users as $key)
      <div class="card">
        <div class="card-header">
          <img src="{{ asset('assets/images/city.jpeg') }}" alt="">
        </div>
        <div class="card-body">
          <span class="tag tag-pink">{{ $key->type }}</span>
          <h4>{{ $key->email }}</h4>
          <p>
            {{ $key->address }}
          </p>
          <div class="user">
            <img src="{{ asset('assets/images/user-3.jpg') }}" alt="">
            <div class="key-info">
              <small>{{ date('d.m.Y H:i:s', strtotime($key->created_at)) }}</small>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    <div class="">
      {!! $users->links() !!}
    </div>
  </div>
  @endsection

  @push('scripts')

  @endpush

