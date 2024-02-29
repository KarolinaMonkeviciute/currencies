<h1>Items</h1>
<a href="{{ route('index') }}">Go Back</a>
<form action="{{ route('update', $item) }}" method="post">
    <label>Item name</label>
    <input type="text" name="name" value="{{ $item->name }}">
    <label>Item price</label>
    <input type="text" name="price" value="{{ $item->price }}">
    <button type="submit">Save</button>
    @method('put')
    @csrf
</form>
