function addPlaceBid (data) {
    var number = $( data ).data('number');
    $.ajax({
        url: "/add-place",
        data: { number: number},
        cache: false
    })
    .done(function( html ) {
        $( ".table-place-bid" ).append( html );
    });
    $( data ).data('number', number+1)
}
function deletePlaceBid (data) {
    $( data ).parent().parent().parent().remove()
}
$(".departure--schedule").click(function(){
    var cityReceipt = $('select[name="city_receipt"]').val();
    var departureCity = $('select[name="departure_city"]').val();
    $.ajax({
        type: "GET",
        url: "/departure-schedule?departure=1&receipt=5",
        data: { departure: departureCity, receipt: cityReceipt },
        success: function(msg){
            $('.departure--schedule--data').html(msg);
        }
    });
});