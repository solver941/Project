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

<form action="{{ route('create_package') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="exampleFormControlInput1">Jméno balíčku</label>
        <input name="name" type="text" class="form-control" placeholder="" required>
    </div>

    <br>
    <div class="form-group">
        <label for="exampleFormControlInput1">Které zboží</label>
        <div class="custom-select" style="width:200px;">

            <select name="product_type">
                <option value="0">Vyber zboží:</option>
                @while($i<$count)
                <option value="{{$product[$i]->description}}">{{$product[$i]->description}}</option>
                <?php
                $i++
                ?>
                 @endwhile

            </select>
        </div>
    </div>



    <br>
    <div class="form-group">
        <label for="exampleFormControlInput1">Kolikrát</label>

<!--        Count by měl  reprezentovat číslo kolik je daného produktu uloženo, aby se do balíčku nepřidalo víc než toho produktu je.
        Bohužel se mi, ale nepovedlo přímo ve view získat vybranou možnost a podle čehož by jsem následně definoval počet pro danej produkt.-->

        <input name="count" type="number" class="form-control-file" placeholder="" max="{{$count}}" required>
    </div>

    <br>


    <div class="form-group">
        <label for="exampleFormControlInput1">Cena</label>
        <input name="price" type="number" class="form-control-file" placeholder="" required>
    </div>

    <br><br>

    <div class="text-lg-right">
        <button  type="submit" class="btn btn-primary">Vytvořit</button>
    </div>

</form>
