<h1>Items</h1>
@foreach ($items as $item)
    <div>
        <h2>{{ $item->name }}<h2>
                <p>{{ $item->price }} {{ $currency }}</p>
    </div>
@endforeach
