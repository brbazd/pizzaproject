<x-app-layout>

    @foreach ($carts as $item)
        {{$item->pizza->name}}
        {{$item->pizza->price}}
        {{$item->qty}}
    @endforeach

</x-app-layout>
