<x-master>
    <div class="container mx-auto flex justify-center">
        <div class="px-12 py-8 bg-gray-700 text-pink-500 border border-pink-500 rounded-lg">
            <div>
                <div>
                    <div class="font-bold text-lg mb-4">{{ __('Login') }}</div>

                    <div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-6">
                                <label for="email" class="block mb-2 uppercase font-bold text-xs text-white">E-Mail
                                    Address</label>

                                <input id="email" type="email" class="border border-pink-500 p-2 w-full" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <p class="text-red-500 text-xs mb-2">{{$message}}</p>
                                @enderror

                            </div>

                            <div class="mb-6">
                                <label for="password"
                                    class="block mb-2 uppercase font-bold text-xs text-white">Password</label>

                                <input id="password" type="password" class="border border-pink-500 p-2 w-full"
                                    name="password" required autocomplete="current-password">

                                @error('password')
                                <p class="text-red-500 text-xs mb-2">{{$message}}</p>

                                @enderror

                            </div>

                            <div class="mb-6">

                                <div class="flex">
                                    <input class="mr-3" class="border border-pink-500" type="checkbox" name="remember"
                                        id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="block mb-2 uppercase font-bold text-xs text-white" for="remember">
                                        Remember Me
                                    </label>
                                </div>

                            </div>

                            <div class="mb-3">
                                <button type="submit"
                                    class="bg-gray-400 border border-pink-500 text-white rounded py-2 px-4 hover:bg-gray-500 hover:text-pink-500 mr-2 ">Submit</button>

                                <a href="{{route('password.request')}}"
                                    class="text-xs text-white hover:text-pink-500">Forgot Your Password?</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-master>