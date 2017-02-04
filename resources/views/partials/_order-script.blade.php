<script src="{{ asset('/js/ajax.js') }}"></script>
<script>
    var i = 1;
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
                '</select> <i class="fa fa-close add-hover" onclick="removeIngredient(this, i)"></i></div>' +
                '<div class="input-group col-md-4 col-xs-4 add-top-spacing">' +
                '<select class="form-control small newIng" name="newSides' + i + '" >' +
                '<option value="1" selected="selected">1</option>' +
                '<option value="2">2</option>' +
                '<option value="3">3</option></select>' +
                '</div></center>' +
                '</div> ');
        i++;
        var url = "/ajaxcall";

        $('.newIng').change(function(){
            var ing_id = $('select[name="newIngID' + (i-1) + '"]').val();
            console.log("test:"+ing_id);
            console.log('select[name="newIngID' + i + '"]');

            $.get(url + '/' + ing_id, function (data) {
                //success data
                console.log(data);

            })
        });
        console.log(i);
    }

    function removeIngredient(e, count){
        console.log(e.parentNode.parentNode);
        if(count==0){
            alert('At least 2 ingredients are required for a dish.');
        }else{
            e.parentNode.parentNode.parentNode.parentNode.remove();
            i--;
        }

    }
</script>