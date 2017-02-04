/**
 * Created by adven on 3/2/2017.
 */

$(document).ready(function(){

    var url = "/ajaxcall";
    var previous;

    $('.medium,.small').on('focus', function () {
        previous = $(this).val();
    }).change(function(){
        var val = $(this).val();
        var ing_id = $(this).data("ing");
        $(this).blur();
        $.get(url + '/' + ing_id, function (data) {
            success(data,val,previous);
        })
    });
});

function success(data,val,previous){

    delete(data.id);
    delete(data.created_at);
    delete(data.updated_at);
    delete(data.ingredient_id);

    var nutrition = $.map(data, function(value, index) {
        return [value];
    });
    tblValArray = [];

    $('#nutritionBody .text-right').each(function()
    {
        tblValArray.push($(this).html());
    });

    tblValArray= tblValArray.map(parseFloat);

    var index = 0;
    $('#nutritionBody .text-right').each(function()
    {
        $(this).html(tblValArray[index] + (nutrition[index]*(val-previous)));
        index++;
    });

    previous = val;

}