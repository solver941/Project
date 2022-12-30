@extends('layouts.app')
@section('content')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link href="css/positions.css" rel="stylesheet"> --}}
@if(isset($product[0]))
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
        $product = \App\Models\Product::all();
        $id = $product[$i]->id;
        $product = \App\Models\Product::where("id", $id)->get()

        ?>


<!--<div class=".d-none .d-xl-block .d-xxl-none ">-->
    <div class="your-class">
        <form action="/product/{{$id}}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")

            <input name="weight" placeholder="váha" type="text" value={{$product[0]->weight}}>
            <input name="unit" placeholder="jednotka" type="text" value={{$product[0]->unit}}>
            <input name="price" placeholder="cena" type="number" value={{$product[0]->price}}>
            &nbsp &nbsp &nbsp &nbsp
            <textarea name="description" placeholder="popis produktu">{{$product[0]->description}}
            </textarea>
            <input name="series_number" placeholder="sériové číslo" type="number" value={{$product[0]->series_number}}>
            <input name="count" placeholder="Počet" type="number" value={{$product[0]->count}}>
            <button type="submit">Update</button>
            &nbsp &nbsp
            <a href="product/{{$product[0]->id}}/delete" class="text-sm text-gray-500 underline">Delete</a>
        </form>

</div><!--</div>-->
    <?php
    $i++
    ?>
    <div class="my-class">
        <a href="/edit/{{$product[0]->id}}"><button class="btn btn-secondary">{{$product[0]->description}}</button></a>
    </div>

@endwhile
@else
    <div class="container">
        <h1>Žádný produkt zde zatím není</h1>
    </div>
@endif
@endsection

