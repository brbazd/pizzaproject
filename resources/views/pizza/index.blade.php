<x-app-layout>

    <table>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th></th>
        </tr>
        @foreach ($pizzas as $pizza)
            <tr>
                <td>
                    <a href="{{route('pizzas.show',$pizza->id)}}">
                        {{$pizza->name}}
                    </a>
                </td>
                <td>
                    <a href="{{route('pizzas.show',$pizza->id)}}">
                        <img src="{{$pizza->image}}" alt="" style="display: block; height: 90px; object-fit: contain;">
                    </a>
                </td>
                <td>{{$pizza->description}}</td>
                <td>{{$pizza->price}}</td>
                <td>
                    <form action="{{route('orders.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="pizza_id" value="{{$pizza->id}}">
                        <input type="number" name="qty" value="1">
                        <button type="submit">Add to Cart</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</x-app-layout>


