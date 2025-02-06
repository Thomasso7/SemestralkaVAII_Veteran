<div class="parts">
    @foreach($spareParts as $part)
        <div class="part">
            <img width="100" src="{{asset("Obrazky/" . $part->image)}}" alt="Valec">
            <p>{{$part->name}}</p>
            <div>
                <p><strong>{{$part->price}} €</strong></p>
                <a href="{{url('addToCart', $part->id . "/" . $part->vehicle_model)}}">
                    <button class="buybtn">Kúpiť</button>
                </a>
                @auth()
                    @if(Auth::user()->usertype == 'admin')
                        <div class="adminbtns">
                            <a href={{url('editSparePart', $part->id)}}>
                                <button class="editbtn">Uprav</button>
                            </a>
                            <a href="{{url('deleteSparePart', $part->id)}}">
                                <button class="deletebtn">Zmaž</button>
                            </a>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    @endforeach
</div>
<div class="pagination-parts">
    {!! $spareParts->links() !!}
</div>
