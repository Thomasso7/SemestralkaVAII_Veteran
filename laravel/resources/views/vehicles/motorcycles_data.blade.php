<div class="box">
    @foreach($motorcycles as $motorcycle)
        <div class="vehicle">
            <img src="Obrazky/{{$motorcycle->image}}" alt="{{$motorcycle->title}}">
            <a href="{{url('vehicle', $motorcycle->id)}}">
                <button class="titlebtn">{{$motorcycle->title}}</button>
            </a>
            @auth()
                @if(Auth::user()->usertype == 'admin')
                    <a href="{{url('editVehicle', $motorcycle->id)}}">
                        <button class="editbtn">Uprav</button>
                    </a>
                    <a href="{{url('deleteVehicle', $motorcycle->id)}}">
                        <button class="deletebtn">Zmaž</button>
                    </a>
                @endif
            @endauth
        </div>
    @endforeach
</div>
<div class="pagination-links">
    {!! $motorcycles->links() !!}
</div>
