<div class="bg-gray-900 md:bg-gray-800 px-2 text-gray-300 border border-pink-500 rounded-lg py-4 px-6">

    <h3 class="font-bold text-white text-center text-xl mb-4">Friends</h3>

    <ul>
        @forelse($data as $user)
        <li class="mb-4 hover:text-pink-500">
            <div>
                <a href="{{route('profile',$user)}}" class="flex items-center text-sm ">

                    <img class="rounded-full mr-2 text-sm" src="{{$user->getAvatar()}}" alt=""
                        style="height:40px; width:40px"> {{$user->name}}
                </a>
            </div>
        </li>
        @empty
        <li class="mb-4">No friends yet!!!</li>
        @endforelse
    </ul>

</div>