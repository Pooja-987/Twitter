<h3 class="text-sm text-gray-800">Comments:</h3>
<div class="m-4">
    @foreach($tweet->comments as $comment)
    <ul>
        <li class="text-sm text-gray-500 flex items-center">
            <img src="{{$comment->user->getAvatar()}}" class="rounded-full mr-2 text-sm" style="width:30px; height:30px"
                alt=""> @ {{$comment->user->username}} : {{$comment->body}}
        </li>
    </ul>
    @endforeach
</div>

<div class="border-b bg-gray-100 w-full rounded-lg px-4 py-2 mb-8">
    {{-- @error('cbody')
    <p class="text-red-500 text-small">{{$message}}</p>
    @enderror --}}
    <form action="/tweets/{{$tweet->id}}/comment" method="POST">
        @csrf
        <!-- <textarea name="body" class="p-2 w-full" placeholder="Write your comment..."></textarea> -->
        <input class="border-b border-gray-400 w-full p-2 mb-2" placeholder="Write here.." type="text" name="cbody"
            id="body">

        <footer class="flex justify-between">

            <img class="rounded-full mr-2 text-sm" src="{{auth()->user()->getAvatar()}}" alt="Profile"
                style="width:30px; height:30px">

            <button type="submit"
                class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow`py-4 px-4 text-sm text-white">Post</button>
        </footer>

    </form>

</div>