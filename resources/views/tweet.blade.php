<div class="flex p-4 {{$loop->last ? '' : 'border-b border-b-gray-400'}} ">
    <div class="mr-2 flex-shrink-0">
        <a href="{{route('profile',$tweet->user)}}">
            <img class="rounded-full mr-2 text-sm" src="{{$tweet->user->getAvatar()}}" style="height:50px; width:50px"
                alt="">
        </a>

    </div>
    <div>
        <a href="{{route('profile',$tweet->user)}}">

            <h5 class="font-bold mb-4">{{$tweet->user->name}}</h5>
        </a>

        <p class="text-small">
            {{$tweet->body}}
        </p>

        {{-- @if(Route::currentRouteName()==route('profile',auth()->user()))
        <form action="/tweets/{{$tweet->id}}" method="post">
            @csrf
            @method('delete')

            <div class="mb-6">
                <button type="submit"
                    class="bg-gray-700 border border-pink-500 hover:bg-gray-800 hover:text-pink-500 rounded-lg shadow`py-3 px-10 text-sm text-white py-2 px-4 mr-4">DELETE</button>
            </div>
        </form>
        @endif --}}

        @include('like',['tweet'=>$tweet])

        @include('comments')

    </div>
</div>