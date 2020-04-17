@extends('layouts._master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>


                @if (empty(@$token))
                <div class="card-body">
                    <div class="alert alert-error" role="alert">
                        <h2 style="text-align: center;">Sorry, This link has been expired !!</h2>
                    </div>
                </div>
                @else
                <div class="card-body">
                    <form method="POST" id="resetPasswordForm" action="{{ url('updatePassword') }}">
                        @csrf

                        <input type="hidden" name="resetToken" value="{{ @$token }}">

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary resetPasswordLink">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<style>
    /*For Forgot password password send link*/
    
    .error{
        color: red !important;
    }
</style>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript">
    jQuery('#resetPasswordForm').validate({
        rules : {
            password : {
                minlength : 8
            },
            password_confirmation : {
                minlength : 8,
                equalTo : "#password"
            }
        }
    });
</script>

@endsection