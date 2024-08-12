@extends('layouts.app')
@section('title','Login Page')
@section('content')
<x-home.navbar />
    <div class="max-w-md m-auto bg-slate-300 shadow-md rounded-lg p-4 mt-2">
        <h1 class="text-center text-xl font-bold mb-2">Wellcome</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf
        @if (session('failed'))
            <x-alerts.failed :failed="session('failed')"  />
        @endif
        <x-input-field  placeholder="Email" type="email" name="email"  />
        @error('email') <x-alerts.error :$message /> @enderror
        <x-input-field  placeholder="Password" type="password" name="password"  />
        @error('password') <x-alerts.error :$message /> @enderror
        <p class="text-sm text-center font-semibold"><a href="{{ route('password.request') }}" class="underline text-red-500">Forgot password?</a></p>
        <div class="flex items-center mb-2">
            <input type="checkbox" name="remember" id="remember">
            <label class="ml-2 font-semibold" for="remember">Remember me</label>
        </div>
       <div class="flex justify-center items-center">
        <button class="btn btn-primary text-white py-3 px-4" >Login</button>
       </div>
        <p class="text-sm text-center">Don't have an account?<a class="text-blue-600" href="{{ route('signup') }}">Signup</a></p>
    </form>
   </div>
@endsection

