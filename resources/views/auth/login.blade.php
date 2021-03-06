@extends('frontend.layout.main')

@section('content')

<section class="" style="background-color: #f27a21;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="{{ asset('assets/images/justice.jpg') }}"
                alt="login form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%;"
                author="Photo by Sora Shimazaki from Pexels"
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <div class="d-flex align-items-center mb-3 pb-1">
                  <img src="{{ asset('assets/images/logo.jpeg') }}" class="img-fluid">
                </div>

                <form action="{{ route('login') }}" method="post">
                  @csrf

                  @if(session('status'))
                    <div class="alert alert-success" role="alert">
                      <h4>
                        <i class="fa-solid fa-thumbs-up"></i>
                        Life is good
                      </h4>
                      <hr>
                      <p class="mb-0">
                        {{ session('status') }}
                      </p>
                    </div> 
                  @else
                    <h4 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h4>
                  @endif

                  <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" />
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>

                  <div class="pt-1 mb-4">
                    <button type="submit" class="btn btn-dark btn-lg btn-block">Login</button>
                  </div>

                  <a class="small text-muted" href="{{ url('forgot-password') }}">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register" style="color: #393f81;">Register here</a></p>
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