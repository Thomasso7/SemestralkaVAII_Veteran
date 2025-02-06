<div class="box">
    @foreach($cars as $car)
        <div class="vehicle">
            <img src="Obrazky/{{$car->image}}" alt={{$car->title}}>
            <a href="{{url('vehicle', $car->id)}}">
                <button class="titlebtn">{{$car->title}}</button>
            </a>
            @auth()
                @if(Auth::user()->usertype == 'admin')
                    <a href={{url('editVehicle', $car->id)}}>
                        <button class="editbtn">Uprav</button>
                    </a>
                    <a href="{{url('deleteVehicle', $car->id)}}">
                        <button class="deletebtn">Zmaž</button>
                    </a>
                @endif
            @endauth
        </div>
    @endforeach
</div>
<div class="pagination-links">
    {!! $cars->links() !!}
</div>
