
<div class="d-flex">
    <form method="post" class="loadingBtn" action="{{ $link ??  route('user.offer.update',$offer->id)}}">
        @csrf
        @method('PUT')
        <div id="status{{$offer->id}}"  style="display: none;">
        </div>
        <div class="Agree-refuse">
        <button type="submit" class="status_offer " data-value="{{$offer->id}}" value="ACCEPTED">موافقة</button>
        <button type="submit" class="status_offer  ref ms-3" data-value="{{$offer->id}}" value="REJECTED">رفض</button>
        </div>
    </form>
</div>

