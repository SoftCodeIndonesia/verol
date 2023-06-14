

$('.tf_stock').change(function (e) { 
    e.preventDefault();
    
    var value = this.value;
    var id = $(this).data('id');

    var actual = $(`.actual_${id}`).val();


    var selector = `.selisih_${id}`;

    console.log(selector);


    if($('input[name=type]').val() == 1){
        if(value > actual){

            $(selector).val(value - actual);
        }else{
            $(selector).val(actual - value);

        }
    }
    

    // console.log(this.value);
});
$('.tf_stock').keyup(function (e) { 
    e.preventDefault();
    var value = this.value;
    var id = $(this).data('id');

    var actual = $(`.actual_${id}`).val();

    var selector = `.selisih_${id}`;


    if($('input[name=type]').val() == 1){
        if(value > actual){

            $(selector).val(value - actual);
        }else{
            $(selector).val(actual - value);

        }
    }
});