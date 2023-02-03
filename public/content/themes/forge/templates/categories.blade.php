<h1>Categories</h1>
<form action="?page=test" method="post">
    <input placeholder="new category" name="categoryName"/>
    <button>Save</button>
</form>
<ul>
    @foreach($categories as $category)
        <li>
            {{$category->name}} <a href="?page=test&delete={{$category->id}}">❌</a>

        </li>
    @endforeach
</ul>

<x-random-number min="50" max="75"/>