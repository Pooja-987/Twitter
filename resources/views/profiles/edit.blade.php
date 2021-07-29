<x-app>
    <div class="lg:flex-1 lg:mx-10" style="max-width:700px">
        <h1 class="mb-2 text-gray-700 text-xl">Edit Profile for {{$user->name}}</h1>

        <hr class="border border-pink-500">
        <br>

        <form method="POST" action="/profiles/{{$user->id}}" enctype="multipart/form-data">

            @csrf
            @method('PATCH')

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">Name</label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name"
                    value="{{$user->name}}" required>
                @error('name')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">Username</label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="username" id="username"
                    value="{{$user->username}}" required>
                @error('username')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="avatar">Profile Image</label>

                <div class=flex>
                    <input class="border border-gray-400 p-2 w-full" type="file" name="avatar" id="avatar"
                        value="{{$user->avatar}}">
                    <img src="{{$user->getAvatar()}}" alt="Your Profile" style="width:40px">

                </div>
                @error('avatar')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
                <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email"
                    value="{{$user->email}}" required>
                @error('email')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
                <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required>
                @error('password')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password_confirmation">Password
                    Confirmation</label>
                <input class="border border-gray-400 p-2 w-full" type="password" name="password_confirmation"
                    id="password_confirmation" required>
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit"
                    class="bg-gray-700 border border-pink-500 hover:bg-gray-800 hover:text-pink-500 rounded-lg shadow`py-3 px-10 text-sm text-white py-2 px-4 mr-4">Submit</button>

                <a href="{{route('profile',auth()->user())}}"
                    class="bg-gray-400 border border-pink-500 hover:bg-gray-800 hover:text-pink-500 rounded-lg shadow`py-3 px-10 text-sm text-black py-2 px-4 mr-4">Cancel</a>
            </div>

        </form>

    </div>
</x-app>