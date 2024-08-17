<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="images/starmoon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style-auth.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
</x-guest-layout> --}}
    <a href="/" class="submit-btn back text-center">Back</a>
    <div class="form-container sign-in-form">
        <div class="form-box sign-in-box">
            <h2>Login</h2>
                <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="field">
                    <i class="uil uil-at"></i>
            <x-text-input id="email" class="block mt-1 w-full" type="email" placeholder="{{ __('Email') }}" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="field">
                    <i class="uil uil-lock-alt"></i>
                    
            <x-text-input id="password" class="password-input"
                            type="password"
                            name="password" placeholder="{{ __('Password') }}"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <div class="eye-btn"><i class="uil uil-eye-slash"></i></div>    
            </div>
                @if (Route::has('password.request'))
                    <div class="forget-link">
                        <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                    </div>
                @endif
                <x-primary-button class="submit-btn">
                    {{ __('Log in') }}
                </x-primary-button>
            </form>
            {{-- <div class="login-options">
                <p class="text">Or, login with...</p>
                <div class="other-logins">
                    <a href=""><img src="images/google-logo.png" alt="Google"></a>
                    <a href=""><img src="images/facebook-logo.png" alt="Facebook"></a>
                    <a href=""><img src="images/apple-logo.png" alt="apple"></a>
                </div>
            </div> --}}
        </div>
        <div class="imgBox sign-in-imgBox">
            <div class="sliding-link">
                <p>Don't have an account?</p>
                <span class="sign-up-btn">Sign up</span>
            </div>
            <img src="images/signup-img.png" alt="">
        </div>
    </div>

    <div class="form-container sign-up-form">
        <div class="imgBox sign-up-imgBox">
            <div class="sliding-link">
                <p>Already a member?</p>
                <span class="sign-in-btn">Sign in</span>
            </div>
            <img src="images/signin-img.jpg" alt="">
        </div>
        <div class="form-box sign-up-box">
            <h2>Sign up</h2>
            {{-- <div class="login-options">
                <div class="other-logins">
                    <a href=""><img src="images/google-logo.png" alt="Google"></a>
                    <a href=""><img src="images/facebook-logo.png" alt="Facebook"></a>
                    <a href=""><img src="images/apple-logo.png" alt="apple"></a>
                </div>
                <p class="text">Or, sign up with email...</p>
            </div> --}}
            <form method="POST" action="{{ route('register') }}">
            @csrf
                <div class="field">
                    <i class="uil uil-at"></i>
                    <x-text-input id="email" class="block mt-1 w-full" type="email"  placeholder="{{ __('Email') }}"  name="email" :value="old('email')" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="field">
                    <i class="uil uil-user"></i>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" placeholder="{{ __('Name') }}" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="invalid-feedback" />
                </div>
                <div class="field">
                    <i class="uil uil-user-circle"></i>
                    <x-text-input id="username" class="block mt-1 w-full" type="text"  placeholder="{{ __('Username') }}"  name="email" :value="old('username')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="invalid-feedback" />
                </div>
                <div class="field">
                    <i class="uil uil-lock-alt"></i>
                    <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password" placeholder="{{ __('Password') }}"
                            required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="invalid-feedback" />
                </div>
                <div class="field">
                    <i class="uil uil-lock-access"></i>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="invalid-feedback" />
                </div>
                <x-primary-button class="submit-btn">
                    {{ __('Register') }}
                </x-primary-button>
            </form>
        </div>
    </div>


    <script>
        const textInputs = document.querySelectorAll("input");

        textInputs.forEach(textInput => {
            textInput.addEventListener("focus",() => {
                let parent = textInput.parentNode;
                parent.classList.add("active");
            });

            textInput.addEventListener("blur",() => {
                let parent = textInput.parentNode;
                parent.classList.remove("active");
            });

        });

        const passwordInput = document.querySelector(".password-input");
        const eyeBtn = document.querySelector(".eye-btn");

        eyeBtn.addEventListener("click",() => {
            if(passwordInput.type === "password"){
                passwordInput.type = "text";
                eyeBtn.innerHTML = "<i class='uil uil-eye'></i>";
            }else{
                passwordInput.type = "password";
                eyeBtn.innerHTML = "<i class='uil uil-eye-slash'></i>";
            }
        });

        const signUpBtn = document.querySelector(".sign-up-btn");
        const signInBtn = document.querySelector(".sign-in-btn");
        const signUpForm = document.querySelector(".sign-up-form");
        const signInForm = document.querySelector(".sign-in-form");

        signUpBtn.addEventListener("click",() => {
            signInForm.classList.add("hide");
            signUpForm.classList.add("show");
            signInForm.classList.remove("show");
        });

        signInBtn.addEventListener("click",() => {
            signInForm.classList.remove("hide");
            signUpForm.classList.remove("show");
            signInForm.classList.add("show");
        });
    </script>
</body>
</html>