@extends('layouts.app')
@section('title','Signup Page')
@section('content')
<x-home.navbar />
   <div class="max-w-md m-auto bg-slate-300 rounded-lg p-4 mt-2">
    <h1 class="text-center font-bold text-xl mb-1">Register</h1>
    <form action="{{ route('signup') }}" method="post">
        @csrf
        @if (session('success'))
            <x-alerts.success :success="session('success')"  />
        @endif
        <x-input-field  placeholder="Name" type="text" name="name"  />
        @error('name') <x-alerts.error :$message /> @enderror
        <x-input-field  placeholder="Email" type="email" name="email"  />
        @error('email') <x-alerts.error :$message /> @enderror
        <x-input-field  placeholder="Password" type="password" name="password"  />
        @error('password') <x-alerts.error :$message /> @enderror
        <x-input-field  placeholder="Confirm Password" type="password" name="password_confirmation"  />
        @error('password_confirmation') <x-alerts.error :$message /> @enderror
       <div class="flex items-center justify-center">
        <button class="btn btn-primary text-white py-3 px-4" >Signup</button>
       </div>
       <p class="text-center ">Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Login</a></p>
    </form>
   </div>
@endsection