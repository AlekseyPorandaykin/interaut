@if(count($departureSchedule)>0)
<table class="table table-striped">
    <thead>
    <tr>
        <th>№</th>
        <th>Дата</th>
        <th>Дата сдачи</th>
        <th>Дата получения</th>
        <th>ГОРОД ОТПРАВЛЕНИЯ</th>
        <th>ГОРОД ПОЛУЧЕНИЯ</th>
    </tr>
    </thead>
    <tbody>
    @foreach($departureSchedule as $departureScheduleItem)
        <tr>
            <th scope="row">{{$departureScheduleItem->number_departure}}</th>
            <td>{{$departureScheduleItem->date}}</td>
            <td>{{$departureScheduleItem->data_delivery}}</td>
            <td>{{$departureScheduleItem->receipt_data}}</td>
            <td>{{$departureCity}}</td>
            <td>{{$cityReceipt}}</td>
        </tr>
    @endforeach

    </tbody>
</table>
@else
    расписаний для данного города нет
@endif