<x-master>
    <div class="container mx-auto flex justify-center">
        <div class="px-20 py-8 bg-gray-700 text-pink-500 border border-pink-500 rounded-lg mb-3" style="width:450px">
            <div>
                <div>
                    <div class="font-bold text-lg mb-4">Register</div>

                    <div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-6">
                                <label for="username"
                                    class="block mb-2 uppercase font-bold text-xs text-white">Username</label>

                                <input id="username" type="text"
                                    class="border border-pink-500 p-2 w-full @error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}" required autocomplete="username"
                                    autofocus>

                                @error('username')
                                <p class="text-red-500 text-xs mb-2">{{$message}}</p>
                                @enderror

                            </div>

                            <div class="mb-6">
                                <label for="name" class="block mb-2 uppercase font-bold text-xs text-white">Name</label>

                                <input id="name" type="text"
                                    class="border border-pink-500 p-2 w-full @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <p class="text-red-500 text-xs mb-2">{{$message}}</p>

                                @enderror

                            </div>

                            <div class="mb-6">
                                <label for="email" class="block mb-2 uppercase font-bold text-xs text-white">E-Mail
                                    Address</label>

                                <input id="email" type="email"
                                    class="border border-pink-500 p-2 w-full @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <p class="text-red-500 text-xs mb-2">{{$message}}</p>

                                @enderror

                            </div>

                            <div class="mb-6">
                                <label for="password"
                                    class="block mb-2 uppercase font-bold text-xs text-white">Password</label>

                                <input id="password" type="password"
                                    class="border border-pink-500 p-2 w-full @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">

                                @error('password')
                                <p class="text-red-500 text-xs mb-2">{{$message}}</p>

                                @enderror

                            </div>

                            <div class="mb-6">
                                <label for="password-confirm"
                                    class="block mb-2 uppercase font-bold text-xs text-white">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password"
                                        class="border border-pink-500 p-2 w-full" name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>
                            </div>

                            <div>

                                <button type="submit"
                                    class="bg-gray-400 border border-pink-500 text-white rounded py-2 px-4 hover:bg-gray-500 hover:text-pink-500 mr-2">
                                    Register
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>