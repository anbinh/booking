

var loaderObj = document.getElementById("canvasLoader");
var cl = new CanvasLoader('canvasloader-container');

$("input.paymentMethod").change(function(){
    var type = $("input.paymentMethod:checked").val();
    if (type == 1){
        $("div.confirm-signin").hide("slow");
    }else{
        $("div.confirm-signin").show("slow");
    }
});
var submit_form = function(){
    console.log('aaaa');
    $("form.payment-form").submit(function( event ) {
        cl.show(); // Hidden by default
        event.preventDefault();
        if($("input.paymentMethod:checked").val() == 0){
            var url = $("form.payment-form").attr( "action" );
            var formValue = $("form.payment-form").serializeArray();
            var posting = $.post(url, formValue);
            posting.done(function( data ) {
                var content = $( data ).find( "#content" );
                $( "#result" ).empty().append( content );
            });
            posting.done(function(data){
                cl.hide();
                console.log(data.error);
                if (data.error != false){
                    alert(data.error);
                }else{
                    window.location.href = NEXT_PAGE;
                };
            });
        }else{
            window.location.href = NEXT_PAGE;
        }
    });
};
$("#finised-button").click(function(event){
    //event.preventDefault();
    if($("input.paymentMethod:checked").val() == 0){
        submit_form();
    }else{
        window.location.href = NEXT_PAGE;
    }
});

