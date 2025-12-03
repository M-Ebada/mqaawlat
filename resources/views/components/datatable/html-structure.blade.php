<table id="{{$id}}"
@if($id != 'datatables')
data-route="{{$route}}"
@endif
class="datatable-parent-table table align-middle table-row-dashed table-row-bordered datatables fs-6 gy-5 text-center">
    <thead>
        <tr class="text-center text-black fw-bolder fs-7 text-uppercase gs-0">
            {{$slot}}
            <th>{{__('Control')}}</th>
        </tr>
    </thead>
</table>
