<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Login</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


    <!--    <link rel="preconnect" href="https://fonts.bunny.net">-->
    <!--    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />-->
    <!--    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>-->
    <!--    <script src="https://cdn.tailwindcss.com"></script>-->

</head>
<body>
<div class="font-sans text-gray-900 antialiased">
    <div class="bg-gray-50  min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#f8f4f3]">
        <div>

            <h2 class="font-bold text-3xl">REGIS <span class="bg-red-500 text-white px-2 rounded-md">TER</span></h2>

        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('login') }}">

                <div class="py-8">
                    <center>
                        <!--                        <span class="text-2xl font-semibold">Log In</span>-->
                    </center>
                </div>

                <div>
                    <label class="block font-medium text-sm text-gray-700" for="email" value="Email" />
                    <input type='email'
                           name='email'
                           placeholder='Email'
                           class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#f84525]" />
                </div>


                <div class="mt-4 ">
                    <label class="block font-medium text-sm text-gray-700" for="password" value="Password" />
                    <div class="relative">
                        <input id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password" class = 'w-full rounded-md py-2.5 px-4 border text-sm outline-[#f84525]'>

                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                        </div>
                    </div>
                </div>

                <div class="mt-4 pb-10">
                    <label class="block font-medium text-sm text-gray-700" for="password" value="Password" />
                    <div class="relative">
                        <input id="password" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="current-password" class = 'w-full rounded-md py-2.5 px-4 border text-sm outline-[#f84525]'>

                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                        </div>
                    </div>
                </div>


                <button class=" bg-blue-500 hover:bg-blue-700 text-white text-center font-bold py-2 px-4 rounded">
                    Login
                </button>

                <div class="flex items-center justify-end mt-4">
                    <a class="hover:underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        Have an Account? .Login
                    </a>


                </div>

            </form>
        </div>
    </div>
</div>

<script>
    const passwordInput = document.getElementById('password');
    const togglePasswordButton = document.getElementById('togglePassword');

    togglePasswordButton.addEventListener('click', () => {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    });
</script>

</body>
</html>