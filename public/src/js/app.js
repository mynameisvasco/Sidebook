function like(){
$("#like").click(function(e) {
    

        $(this).removeClass('fa-heart-o').addClass('fa-heart');
        $(this).attr('id', 'unlike');
    
});

$("#unlike").click(function(e) {


        $(this).removeClass('fa-heart').addClass('fa-heart-o');
        $(this).attr('id', 'like');

    
});
};