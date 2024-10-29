@extends('layouts.front.main')
@section('content')
<section class="vh-100">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-black mx-auto">
          <div class="px-5 ms-xl-4">
            <img src="{{asset('assets/images/logo.png')}}" class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4">
          </div>
</br></br></br>
          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
            <form method="POST" action="{{ route('login') }}" style="width: 23rem;">
                @csrf
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                <div class="form-outline mb-4">
                    <input type="email" id="email" class="form-control form-control-lg" name="email" :value="old('email')" required autofocus autocomplete="username">
                    <label class="form-label" for="email">Email address</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="password" class="form-control form-control-lg" name="password" required autocomplete="current-password">
                    <label class="form-label" for="password">Password</label>
                </div>

                <div class="pt-1 mb-4">
                    <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a></p>
                <p>Don't have an account? <a href="{{url('/signup')}}" class="link-info">Register here</a></p>

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
