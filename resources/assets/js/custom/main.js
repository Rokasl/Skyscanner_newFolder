

$(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
});

$('.remote-selector').selectize({
    plugins: ['remove_button'],
    valueField: 'PlaceId',
    labelField: 'PlaceName',
    searchField: ['PlaceId', 'CountryName', 'CityId', 'PlaceName'],
    options: [],
    persist: false,
    loadThrottle: 300,
    create: false,
    allowEmptyOption: false,
    preload: 'focus',
    render: {
        option: function(item, escape) {

            console.log(item);
            return '<div class="question-selector">' +
                '<span class="title">' +
                '<span class="name"><i style="color: #2b1bb9" class="fa fa-fighter-jet"></i> <b>' + escape(item.CountryName) + '</b>,  ' + escape(item.PlaceName) + '</span>' +
                '</span>' +
                '</div>';
        }
    },
    load: function (query, callback) {

        $.ajax({
            url: '/api/search-destination',
            type: 'GET',
            dataType: 'json',
            data: {
                q: query,
            },
            error: function () {
                callback();
            },
            success: function (res) {
                callback(res);
            }
        });
    }
});


$('[data-upvote]').on('click', function () {
    $.ajax({
        url: '/api/add-vote',
        type: 'POST',
        dataType: 'json',
        data: {
            flight_id: $(this).attr('data-upvote'),
        },
        error: function () {
            console.log('error');
        },
        success: function (res) {

            console.log('success');
        }
    });
});