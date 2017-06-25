function addPlaceBid (data) {
    var number = $( data ).data('number');
    console.log(number);
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