<div class="box">
@foreach($vehicles as $vehicle)
    @if($vehicle->type == "Motorka")
        <div class="vehicle">
            <img src="Obrazky/{{$vehicle->image}}" alt="{{$vehicle->title}}">
            <a href="{{url('vehicle', $vehicle->id)}}">
                <button class="titlebtn">{{$vehicle->title}}</button>
            </a>
            @auth()
                @if(Auth::user()->usertype == 'admin')
                    <a href="{{url('editVehicle', $vehicle->id)}}">
                        <button class="editbtn">Uprav</button>
                    </a>
                    <a href="{{url('deleteVehicle', $vehicle->id)}}">
                        <button class="deletebtn">Zmaž</button>
                    </a>
                @endif
            @endauth
        </div>
    @endif
@endforeach
<div class="div2">
    {!! $vehicles->links() !!}
</div>
</div>
