@extends('layouts.app')
@section('content')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link href="css/positions.css" rel="stylesheet"> --}}
    @if (isset($product[0]))
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-block">
                {{ session('success') }}
            </div>
        @endif

        @while ($i < $count)
                <?php
                $product = \App\Models\Package::all();
                $id = $product[$i]->id;
                $product = \App\Models\Package::where("id", $id)->get()

                ?>


                <!--<div class=".d-none .d-xl-block .d-xxl-none ">-->
            <div class="your-class">
                <form action="/product/{{ $id }}/update" method="POST" enctype="multipart/form-data"class="table-responsive">
                    @csrf
                    @method('PATCH')
                    <table class="table">
                        <thead class="table-dark text-center">
                        <tr>
                            <th>váha</th>
                            <th>jednotka</th>
                            <th>cena</th>
                            <th>sériové číslo</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="">
                            <td class=""><input name="weight" placeholder="váha" type="text"  class="form-control" value={{ $product[0]->weight }}></td>
                            <td class=""><input name="unit" placeholder="jednotka" type="text"  class="form-control"
                                                value={{ $product[0]->unit }} ></td>
                            <td class=""><input name="price" placeholder="cena" type="number"  class="form-control" value={{ $product[0]->price }}></td>
                            <td class=""><input name="series_number" placeholder="sériové číslo" type="number"
                                                value={{ $product[0]->series_number }} class="form-control"></td>

                            <td class="">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="package/{{ $product[0]->id }}/delete" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>

            </div>
            <!--</div>-->
                <?php
                $i++;
                ?>
                <div class="my-class">
                    <a href="/edit_package/{{ $product[0]->id }}"><button
                            class="btn btn-secondary">{{ $product[0]->name }}</button></a>
                </div>

        @endwhile
    @else
        <div class="container">
            <h1>Žádný produkt zde zatím není</h1>
        </div>
    @endif
@endsection
