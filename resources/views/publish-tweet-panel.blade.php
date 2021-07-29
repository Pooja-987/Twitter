<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form action="/tweets" method="POST">
        @csrf
        <textarea name="body" class="w-full p-5" placeholder="What's up???" autofocus></textarea>
        <hr class="my-4">

        <footer class="flex justify-between">

            <img class="rounded-full mr-2 text-sm" src="{{auth()->user()->getAvatar()}}" alt="Profile"
                style="height:50px; width:50px">

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow`py-3 px-10 text-sm text-white">Tweet-tweet!</button>
        </footer>

    </form>

    @error('body')
    <p class="text-red-500 text-small">{{$message}}</p>
    @enderror
</div>