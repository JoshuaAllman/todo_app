@extends('layouts.main')

@section('header')

@section('content')

<div class="container">
    <header class="card-header">Contact Us</header>

    <main class="card-body">
        <form method="POST" action="">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                <div class="register-form">
                    <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <div class="register-form">
                    <input id="email" placeholder="E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Subject</label>
                <div class="register-form">
                    <input placeholder="Subject" type="password" oncopy="return false" onpaste="return false" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group.row">
                <label class="col-md-4 col-form-label text-md-right">Message</label>
                <div class="register-form">
                    <textarea placeholder="Type here..." class="input-form-message"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="register-button offset-md-4">
                    <button type="submit" class="contact-submit-button">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </main>
</div>
@endsection
