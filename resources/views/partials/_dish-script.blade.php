<script>
    var i = 1;
    function addrow() {
        $('#new_ing').append('<div id="added' + i + '" class="form-group col-xs-6"><div class="input-group">' +
                '<span class="input-group-addon"><i class="fa fa-coffee"></i></span>' +
                '<select class="form-control" name="ingredients' + i + '">' +
                '<option value="0">White Rice</option>' +
                '<option value="1">Lemak Rice</option>' +
                '<option value="2">Seasoned Rice</option>' +
                '<option value="3">Whole Chicken</option>' +
                '<option value="4">1/2 Chicken</option>' +
                '<option value="5">Small Chicken</option' +
                '><option value="6">Carrot</option>' +
                '<option value="7">Lettuce</option>' +
                '<option value="8">Onion</option>' +
                '<option value="9">Cucumber</option>' +
                '<option value="10">Trout</option>' +
                '<option value="11">Salmon</option>' +
                '<option value="12">Tilapia</option>' +
                '<option value="13">Prawn</option>' +
                '<option value="14">Sambal</option>' +
                '<option value="15">Mayonnaise</option>' +
                '</select> <i class="fa fa-close add-hover" onclick="removeIngredient(this, i)"></i></div></div> ');
        i++;
        console.log(i);
    }

    function removeIngredient(e, count){
        console.log(e.parentNode.parentNode);
        if(count==0){
            alert('At least 2 ingredients are required for a dish.');
        }else{
            e.parentNode.parentNode.remove();
            i--;
        }

    }
</script>