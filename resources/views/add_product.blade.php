@extends('layouts.app')
@section('content')
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

<form action="{{ route('product_store') }}" method="POST" enctype="multipart/form-data">
    @csrf

        <div class="form-group">
            <label for="exampleFormControlInput1">Váha</label>
            <input name="weight" type="text" class="form-control" placeholder="" required>
        </div>

        <br>
    <div class="form-group">
        <label for="exampleFormControlInput1">Jednotka</label>
        <input name="unit" type="text" class="form-control" placeholder="" required>
    </div>

<br>
        <div class="form-group">
            <label for="exampleFormControlInput1">Cena</label>
            <input name="price" type="number" class="form-control-file" placeholder="" required>
        </div>

        <br><br>


        <div class="form-group">

            <br><br><br>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Popis produktu</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="10" required></textarea>
            </div>
        </div>
        <div class="text-lg-right">
            <button  type="submit" class="btn btn-primary">Přidat</button>
        </div>

</form>
@endsection
