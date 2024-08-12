@extends('layouts.app')
@section('title','Forgot Password')
@section('content')
<div class="max-w-lg m-auto bg-slate-300 p-4">
    <h1>{{ $name }}</h1>
    <p>You will receive an email after submiting your email!</p>
    <form action="{{ route('password.email') }}" method="post">
        @if(session('success')){
            {{ session('success') }}
        }
        @endif
        @csrf
        <x-input-field  placeholder="Email" type="email" name="email"  />
        @error('email') <x-alerts.error :$message /> @enderror
        <button type="submit" class="btn btn-primary text-white py-3 px-4" >Reset</button>
    </form>
   </div>
@endsection
