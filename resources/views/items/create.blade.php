<h1>Add new item</h1>
<form action="{{ route('store') }}" method="post">
    <label>Item name</label>
    <input type="text" name="name">
    <label>Item price</label>
    <input type="text" name="price">
    <button type="submit">Add</button>
    @csrf
</form>
