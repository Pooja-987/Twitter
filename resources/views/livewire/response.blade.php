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

<!-- @livewire('response',['d'=>$d]) -->