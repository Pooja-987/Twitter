<x-master>
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                @if(auth()->check())
                <div
                    class="w-full md:w-1/5 bg-gray-900 md:bg-gray-900 px-2 border border-pink-500 text-center rounded-lg p-4">
                    @include('sidebar-links')
                </div>
                @endif
                <div class="lg:flex-1 lg:mx-10" style="max-width:700px">

                    {{ $slot }}

                </div>
                @if(auth()->check())
                <div class="lg:w-1/5 bg-blue-0 rounded-lg">
                    @livewire('friends-list')
                </div>
                @endif
            </div>
        </main>
    </section>
</x-master>