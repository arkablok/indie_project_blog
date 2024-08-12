@extends('layouts.app')
@section('title','Reset Password')
@section('content')
<div class="max-w-lg m-auto bg-slate-300 p-4">
    <p>You will recieve an email after submiting your email!</p>
    <form action="{{ route('password.update') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <x-input-field  placeholder="Email" type="email" name="email"  />
        @error('email') <x-alerts.error :$message /> @enderror
        <x-input-field  placeholder="New Password" type="password" name="password"  />
        @error('password') <x-alerts.error :$message /> @enderror
        <x-input-field  placeholder="Confirm New Password" type="password" name="password_confirmation"  />
        @error('password_confirmation') <x-alerts.error :$message /> @enderror
        <button type="submit" class="btn btn-primary text-white py-3 px-4" >Reset Now</button>
    </form>
   </div>
@endsection