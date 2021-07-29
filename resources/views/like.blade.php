<div class="flex">

        <form action="/tweets/{{$tweet->id}}/like" method="POST">
                @csrf
                <div class="flex items-center mr-4 ">
                        <button type="submit" class="text-xs text-gray-500">

                                <img src="/images/thumbs-up.svg" style="width:15px" class="m-2" alt="">

                        </button>
                        <span>
                                {{$tweet->likes_count?:0}}</span>
                </div>
        </form>

        <form action="/tweets/{{$tweet->id}}/like" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex items-center">
                        <button type="submit" class="text-xs text-gray-500">
                                <img src="/images/thumbs-down.svg" style="width:15px" class="m-2" alt="">
                        </button>

                        <span>{{$tweet->dislikes_count?:0}}</span>
                </div>
        </form>

</div>