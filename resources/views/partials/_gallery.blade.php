<div class="container">
    <div class="row">
    @foreach ($gallery as $gal)
        <div class="col-sm-4">
            <span class="img-back"><img src="{{ asset($gal->image)}}" alt="" /></span>
        </div>
    @endforeach
    </div>
</div>