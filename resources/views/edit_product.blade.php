@extends('layouts.app')
@section('content')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link href="css/positions.css" rel="stylesheet"> --}}

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger alert-block">
            {{ session('success') }}
        </div>
    @endif



    <form action="/product/{{$id}}/update" method="POST" enctype="multipart/form-data">
     @method("PATCH")
        <div class="d-flex justify-content-center">
            <div class="col-12 col-md-10 col-lg-6">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Upravit Produkt</h3>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Váha</label>
                            <input name="weight" type="text" class="form-control" placeholder="" required value={{$weight}} >
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Jednotka</label>
                            <input name="unit" type="text" class="form-control" placeholder=""  required value={{$unit}}>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Cena</label>
                            <input name="price" type="number" class="form-control" placeholder="" value={{$price}} required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Popis produktu</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="10" required>{{$description}}</textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Uložit změny</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
