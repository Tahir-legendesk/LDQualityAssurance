@include('../includes/compatibility')
<title>{{ config('app.name', 'Laravel') }}</title>
<meta name="description" content="">
@include('../includes/style')
<meta charset='utf-8' />
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20">Reset Password</h5>
                                <p class="text-white-50 mb-0">
                                    {{ config('app.name', 'Laravel') }}</p>
                                <a href="#" class="logo logo-admin mt-4">
                                    <img src="assets/images/logo-light.png" alt="" height="30">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">

                            <div class="p-2">


                                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="alert alert-success text-center mb-4" role="alert">
                                        Enter your Email and instructions will be sent to you!
                                    </div>

                                    {{-- <div class="mb-3">
                                        <label class="form-label" for="useremail">Email</label>
                                        <input type="email" class="form-control" id="useremail"
                                            placeholder="Enter email">
                                    </div> --}}
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    {{-- <div class="row mb-0">
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Reset</button>
                                        </div>
                                    </div> --}}
                                    <div class="row mb-0">
                                        <div class="col-12 text-end">
                                            <button type="submit"
                                                class="btn btn-primary w-md waves-effect waves-light">
                                                {{ __('Send Password Reset Link') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> {{ config('app.name', 'Laravel') }} Crafted with <i
                                class="mdi mdi-heart text-danger"></i> by
                            Legendesk
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('../includes/scripts')
</body>

</html>
