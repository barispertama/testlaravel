@include('layouts/header')


<div class="w-1/2 p-3 mx-auto text-center border">

    <form action="/register" method="post">
        @csrf
        <div class="mb-6">
            @error('name')
            <div data-form-alert-danger="" class="alert alert-danger col-12">Oops...! Full Name Tidak boleh kosong!</div>
            @enderror
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Name</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John"  @error('name') is-invalid @enderror required>
            </div>
        </div>
        <div class="mb-6">
            @error('email')
            <div data-form-alert-danger="" class="alert alert-danger col-12">Oops...! Email Tidak boleh kosong atau sudah terdaftar!</div>
            @enderror
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white  text-left">Email address</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" id="email" @error('email') is-invalid @enderror required>
        </div> 
        <div class="mb-6">
            @error('password')
            <div data-form-alert-danger="" class="alert alert-danger col-12">Oops...! Password Tidak boleh kosong! min 5 karakter</div>
            @enderror
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white  text-left">Password</label>
            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••"  id="password" @error('password') is-invalid @enderror required>
        </div> 

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
    
    
    </div>