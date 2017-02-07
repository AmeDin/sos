<script src="{{ asset('/js/ajax.js') }}"></script>
<script>
    var i = 1;
    var url = "/ajaxcall";
    function addrow() {

        $('#new_ing').append('<div id="added' + i + '" class="col-md-4 col-xs-6 cardCustoms text-center"><center><div>' +
                '<div class="input-group col-md-8 col-xs-8 add-top-spacing">' +
                '<span class="input-group-addon"><i class="fa fa-coffee"></i></span>' +
                '<select class="form-control" name="newIngID' + i + '">' +
                '<option value="4">Whole Chicken</option>' +
                '<option value="5">1/2 Chicken</option>' +
                '<option value="6">Small Chicken</option>' +
                '<option value="11">Trout</option>' +
                '<option value="12">Salmon</option>' +
                '<option value="13">Tilapia</option>' +
                '<option value="14">Prawn</option>' +
                '</select> <i class="fa fa-close add-hover" onclick="removeIngredient($(this), i)"></i></div>' +
                '<div class="input-group col-md-4 col-xs-4 add-top-spacing">' +
                '<select id="sides' + i +'"  class="form-control small newIng" data-ing="4" name="newSides' + i + '" >' +
                '<option value="1" selected="selected">1</option>' +
                '<option value="2">2</option>' +
                '<option value="3">3</option></select>' +
                '</div></center>' +
                '</div> ');

        $("#sides" + i).on('focus', function () {
            previous = $(this).val();
        }).change(function(){
            var val = $(this).val();
            var ing_id = $(this).parent().parent().children(':first-child').children(':nth-child(2)').val();
            $(this).blur();
            $.get(url + '/' + ing_id, function (data) {
                success(data,val,previous);
                console.log(data);
            })
        });

        $.get(url + '/4' , function (data) {
            success(data,1,0);
            console.log(data);
        });

        i++;
    }

    function removeIngredient(e, count){
        //console.log(e.parentNode.parentNode);
        var ing_id = e.parent().parent().parent().parent().parent().parent().parent().children(':first-child').children(':nth-child(7)').children(':first-child').children(':first-child').children(':first-child').children(':first-child').children(':nth-child(2)').val();
        var val = e.parent().parent().parent().parent().parent().parent().parent().children(':first-child').children(':nth-child(7)').children(':first-child').children(':first-child').children(':first-child').children(':nth-child(2)').children(':first-child').val();

        $.get(url + '/' + ing_id, function (data) {
            success(data,0,val);
            console.log(data);
        });

        if(count==0){
            alert('At least 2 ingredients are required for a dish.');
        }else{
            e.parent().parent().parent().parent().remove();
            i--;
        }
    }
</script>