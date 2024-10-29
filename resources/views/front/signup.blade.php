@extends('layouts.front.main')
@section('content')
<section class="vh-200">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-black mx-auto">
          <div class="px-5 ms-xl-4">
            <img src="{{asset('assets/images/logo.png')}}" class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4">
          </div>
</br></br></br>
          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
            <form method="POST" action="{{ route('register') }}"  style="width: 23rem;">
                @csrf

          <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign up</h3>

          <div class="form-outline mb-4">
            <x-text-input id="email" class="form-control form-control-lg"  type="email" name="email" :value="old('email')" required autocomplete="username"/>
            <x-input-label class="form-label" for="email">Email address</x-input-label>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

          </div>

          <div class="form-outline mb-4">
            <x-text-input id="password" class="form-control form-control-lg" type="password"
            name="password"
            required autocomplete="new-password"/>
            <x-input-label class="form-label" for="password">Password</x-input-label>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>


          <div class="form-outline mb-4">
            <x-text-input id="password_confirmation" class="form-control form-control-lg" type="password"
            name="password_confirmation"
            required autocomplete="new-password"/>
            <x-input-label class="form-label" for="password_confirmation">Confirm Password</x-input-label>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
          </div>

          <div class="form-outline mb-4">
            <input id="name" name="name" class="form-control form-control-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-label class="form-label" for="name">Name</x-input-label>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          <div class="pt-1 mb-4">
            <x-primary-button class="btn btn-info btn-lg btn-block" type="submit">Sign Up</x-primary-button>
          </div>

        </form>

      </div>

    </div>
  </div>
</div>


        </div>
      </div>
    </div>
  </section>
@endsection
