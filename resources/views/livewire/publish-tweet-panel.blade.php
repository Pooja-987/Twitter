<div>

    <div>
        @if (session()->has('message'))
        <div class="p-3 mb-2 bg-green-400 text-green-800 rounded shadow-sm">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <div class="border border-gray-500 rounded-lg px-8 py-6 mb-8">

        <!-- <form action="/tweet" method="POST"> -->
        <form wire:submit.prevent="store" method="post">
            @csrf

            <textarea name="body" class="w-full p-5" wire:model.debounce.500ms="tweet" placeholder="What's up???"
                autofocus required></textarea>
            <hr class="my-4 border border-pink-400">
            @error('tweet')
            <p class="text-red-500 text-small">{{$message}}</p>
            @enderror

            <footer class="flex justify-between">

                <img class="rounded-full mr-2 text-sm" src="{{auth()->user()->getAvatar()}}" alt="Profile"
                    style="height:50px; width:50px">

                <button type="submit"
                    class="bg-gray-700 border border-pink-500 hover:bg-gray-800 hover:text-pink-500 rounded-lg shadow`py-3 px-10 text-sm text-white">Tweet-tweet!</button>
            </footer>

        </form>

    </div>

    <div class="border border-pink-300 rounded-lg mb-4">

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

                    <h5 class="font-bold mb-4 text-gray-700">{{$d->user->username}}</h5>
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

                        @error('body')
                        <p class="text-red-500 text-small">{{$message}}</p>
                        @enderror
                    </div>

                </div>

            </div>
        </div>

        @endforeach

    </div>

</div>