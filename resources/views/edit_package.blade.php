<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link href="css/positions.css" rel="stylesheet">
@if (session("success"))
    <div class="alert alert-success">
        {{ session("success") }}
    </div>
@elseif (session("error"))
    <div class="alert alert-danger alert-block">
        {{ session("success") }}
    </div>
@endif

@while($i<$count)
        <?php
        $product = \App\Models\Package::all();
        $id = $product[$i]->id;
        $product = \App\Models\Package::where("id", $id)->get()

        ?>
    <div class="your-class">
        <form action="/package/{{$id}}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")

            <input name="name" placeholder="váha" type="text" value={{$product[0]->name}}>
            <input name="product_type" placeholder="jednotka" type="text" value={{$product[0]->product_type}}>
            <input name="count" placeholder="cena" type="number" value={{$product[0]->count}}>
            &nbsp &nbsp &nbsp &nbsp
            <input name="price" placeholder="sériové číslo" type="number" value={{$product[0]->price}}>
            <button type="submit">Update</button>
            &nbsp &nbsp
            <a href="package/{{$product[0]->id}}/delete" class="text-sm text-gray-500 underline">Delete</a>
        </form>

    </div>
        <?php
        $i++
        ?>
@endwhile
