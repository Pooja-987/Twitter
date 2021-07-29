<div class="border border-gray-300 rounded-lg mb-4">

    @foreach($tweets as $tweet)
    @include('tweet',[
    'tweet'=>$tweet
    ])

    @endforeach

    {{-- {{$tweets->links()}} --}}
</div>