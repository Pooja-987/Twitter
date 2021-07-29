<div class="lg:flex-1 lg:mx-10" style="max-width:700px">

    <div class="justify-between items-center mb-6">
        <h3 class="text-gray-800 text-xl">Find New Friends!!!</h3>
    </div>

    <div>
        <form wire:submit.prevent="searchUser({{$users}})">
            @csrf
            <div class="flex items-center">
                <input class="border border-pink-500 w-full p-2 mr-2" wire:model.debounce.500="name"
                    placeholder="Search here.." type="text" name="name" id="name" required>
                <button type="submit"
                    class="bg-gray-700 border border-pink-500 hover:bg-gray-800 hover:text-pink-500  rounded-lg shadow py-3 px-4 text-sm text-white">
                    search
                </button>
            </div>
        </form>
    </div>

    <div class="mt-2">
        {{-- <a href="{{route('profile',auth()->user())}}" class="flex items-center mb-7">

        <img src="{{auth()->user()->getAvatar()}}" class="rounded-full mr-2 text-sm" alt="{{auth()->user()->username}}"
            style="width:60px; height:60px ">
        <h4 class="font-bold text-gray-700 text-pink-500">@ You</h4>
        </a> --}}
        @if(count($users)>0)

        @foreach ($users as $user)

        <a href="{{route('profile',$user)}}" class="flex items-center mb-7">

            <img src="{{$user->getAvatar()}}" class="rounded-full mr-2 text-sm" alt="{{$user->username}}"
                style="width:60px; height:60px ">

            <h4 class="font-bold text-gray-700 hover:text-pink-500">{{'@' . $user->username}}</h4>

        </a>
        @endforeach
        @else
        <h3>No Result Found!!!</h3>
        @endif

    </div>

    <div>
        <button type="submit" wire:click="goBack"
            class="bg-gray-700 border border-pink-500 hover:bg-gray-800 hover:text-pink-500  rounded-lg shadow py-3 px-4 text-sm text-white">
            back
        </button>
    </div>
</div>