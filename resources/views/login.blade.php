<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <div class="container border">
        <div class="row mb-4">
            <div class="grid mt-4">
                <form action="{{ route('login.auth') }}" method="POST">
                    @csrf
                    @method('POST')
                    @if (Session::get('failed'))
                        <div class="px-2 py-4 bg-red-300 bg-opacity-60 mb-10 rounded-md">{{ Session::get('failed') }} </div>
                    @endif
                    @if (Session::get('logout'))
                        <div class="px-2 py-4 bg-indigo-300 bg-opacity-60 mb-10 rounded-md">{{ Session::get('logout') }} </div>
                    @endif
                    @if (Session::get('canAccess'))
                        <div class="px-2 py-4 bg-yellow-300 bg-opacity-60 mb-10 rounded-md">{{ Session::get('canAccess') }} </div>
                        @endif
                    @if (Session::get('AlreadyAccess'))
                        <div class="px-2 py-4 bg-yellow-300 bg-opacity-60 mb-10 rounded-md">{{ Session::get('AlreadyAccess') }} </div>
                    @endif
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    @error('email')
                    <small class="text-red-600">{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    @error('password')
                    <small class="text-red-600">{{ $message }}</small>
                    @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>









{{-- <form class="max-w-md mx-auto mt-52" action="{{ route('login.auth') }}" method="POST">
    @csrf
    @method('POST')
    @if (Session::get('failed'))
        <div class="px-2 py-4 bg-red-300 bg-opacity-60 mb-10 rounded-md">{{ Session::get('failed') }} </div>
    @endif
    @if (Session::get('logout'))
        <div class="px-2 py-4 bg-indigo-300 bg-opacity-60 mb-10 rounded-md">{{ Session::get('logout') }} </div>
    @endif
    @if (Session::get('canAccess'))
        <div class="px-2 py-4 bg-yellow-300 bg-opacity-60 mb-10 rounded-md">{{ Session::get('canAccess') }} </div>
    @endif
    @if (Session::get('AlreadyAccess'))
        <div class="px-2 py-4 bg-yellow-300 bg-opacity-60 mb-10 rounded-md">{{ Session::get('AlreadyAccess') }} </div>
    @endif
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="email" id="email"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
        <label for="email"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
            address</label>
        @error('email')
            <small class="text-red-600">{{ $message }}</small>
        @enderror
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="password" name="password" id="password"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " />
        <label for="password"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
        @error('password')
            <small class="text-red-600">{{ $message }}</small>
        @enderror
    </div>


    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
</form> --}}