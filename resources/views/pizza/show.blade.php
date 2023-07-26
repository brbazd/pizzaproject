<x-app-layout>
    <h2>{{$pizza->name}}</h2>
    <p>{{$pizza->description}}</p>
    <h4>{{$pizza->price}}</h4>
    <img src="{{$pizza->image}}" alt="">

    <form action="{{route('cart.store')}}" method="post">
        @csrf
        <input type="hidden" name="pizza_id" value="{{$pizza->id}}">
        <button type="submit">Add to Cart</button>
    </form>
</x-app-layout>
