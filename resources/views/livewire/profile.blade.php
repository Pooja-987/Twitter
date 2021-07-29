<div>

    <header class="mb-7 relative">

        <div class="relative">
            <img class="mb-5" src="/images/pexels-jonathan-meyer-752484.jpg"
                style="border-radius:2%; height:350px; width:100%" alt="">
            <img class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                src="{{$user->getAvatar()}}" style="width:150px; height:150px; left:50%" alt="">

        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width:250px">
                <h2 class="font-bold text-2xl text-gray-800 mb-2">{{$user->name}}</h2>
                <h3 class="font-bold text-xl text-gray-500 mb-2">{{$user->username}}</h3>
                <p class="text-sm text-gray-700">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>

            <div class="flex">

                @can('edit',$user)
                <a href="/profiles/{{$user->id}}/edit"
                    class=" rounded-full bg-gray-600 text-white hover:text-pink-500 border border-pink-500 py-3 px-7 mx-2 text-black text-xs">Edit
                    Profile</a>
                @endcan

                @unless(auth()->user()->is($user))

                <button type="submit" wire:click="profileFollow({{$user}})"
                    class="bg-gray-700 border border-pink-500 rounded-full shadow py-3 px-7 text-white hover:text-pink-500 text-xs">

                    {{auth()->user()->following($user) ? 'Unfollow' : 'Follow Me'}}
                </button>

                @endunless

            </div>
        </div>

        <p class="text-sm text-gray-600">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error, eligendi. Suscipit harum doloribus aut
            dolore architecto ratione, maiores est incidunt et, debitis ea nisi explicabo eaque minus, totam odio atque.
        </p>
    </header>

    <hr>

    <div class="border border-gray-700 rounded-lg mb-4">

        @foreach($data as $d)

        <div class="flex p-4 {{$loop->last ? '' : 'border-b border-pink-400'}} ">
            <div class="mr-2 flex-shrink-0">
                <a href="{{route('profile',$d->user)}}">
                    <img class="rounded-full mr-2 text-sm" src="{{$d->user->getAvatar()}}"
                        style="height:50px; width:50px" alt="">
                </a>

            </div>
            <div>
                <a href="{{route('profile',$d->user)}}">

                    <h5 class="font-bold text-gray-700 mb-4">{{$d->user->username}}</h5>
                </a>

                <p class="text-small text-gray-600">
                    {{$d->body}}
                </p>

                <div class="flex">

                    <div class="flex items-center mr-4 ">
                        <button type="submit" wire:click="likeTweet({{$d}})" class="text-xs text-gray-500">

                            <img src="/images/thumbs-up.svg" style="width:15px" class="m-2" alt="">

                        </button>
                        <span>
                            {{$d->likes_count?:0}}</span>
                    </div>

                    <div class="flex items-center">
                        <button type="submit" wire:click="dislikeTweet({{$d}})" class="text-xs text-gray-500">
                            <img src="/images/thumbs-down.svg" style="width:15px" class="m-2" alt="">
                        </button>

                        <span>{{$d->dislikes_count?:0}}</span>
                    </div>

                </div>

                <div>
                    <h3 class="text-sm text-gray-800">Comments:</h3>
                    <div class="m-4">
                        @foreach($d->comments as $comment)
                        <ul>
                            <li class="text-sm text-gray-500 flex items-center">
                                <img src="{{$comment->user->getAvatar()}}" class="rounded-full mr-2 text-sm"
                                    style="width:30px; height:30px" alt=""> @ {{$comment->user->username}} :
                                {{$comment->body}}
                            </li>
                        </ul>
                        @endforeach
                    </div>

                    <div class="border border-pink-100 bg-gray-100 w-full rounded-lg px-4 py-2 mb-8">
                        {{-- @error('tweetComment')
                        <p class="text-red-500 text-small">{{$message}}</p>
                        @enderror --}}
                        <form wire:submit.prevent="addComment({{$d}})" method="post">
                            @csrf
                            <input class="border-b border-pink-500 w-full p-2 mb-2"
                                wire:model.debounce.500ms="tweetComment" placeholder="Write here.." type="text"
                                name="body" id="body" required>

                            <footer class="flex justify-between">

                                <img class="rounded-full mr-2 text-sm" src="{{auth()->user()->getAvatar()}}"
                                    alt="Profile" style="width:30px; height:30px">

                                <button type="submit"
                                    class="bg-gray-700 border border-pink-500 hover:bg-gray-800 hover:text-pink-500  rounded-lg shadow`py-4 px-4 text-sm text-white">Post</button>
                            </footer>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>

</div>