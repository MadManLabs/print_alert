/* BEGIN: Config **/
function getCsrf(){
    return $('meta[name="csrfToken"]').attr('content');

}

function getAbsoulutUrl(){
    return $('meta[name="absoluteUrl"]').attr('content');
}

/* END: Config **/

$(".input-form input").on("focus", function() {
    $(".input-form").addClass("focused");
});

$(".input-form input").on("blur", function() {
    $(".input-form").removeClass("focused");
});

$(".dribbble").on("click", function() {
    $(this).toggleClass("selected");
});


$(".submit").on("click", function() {
    $(this).addClass("success");

   $('<div class="dribbble selected"><span></span></div>').appendTo(this);

    $(
        '<div class="message"><h1>Ihre St&ouml;rung wurde eingereicht.</h1><span>Ihr Administrator wird sich darum k&uuml;mmern.</span> </div>'
    ).appendTo(".modal");

    setTimeout(function () {
        location.reload();
    }, 3000);

});

var id = 0;

function showModal(_id = 0) {
    id = _id;
    console.log(id);
    modalState = 0;
    $(".modal").show();
}

function hideModal(){
    for (var i = 0; i < evaluation.length; i++) {
        evaluation[i] = 0;
        // Do something with element i.
    }
    $(".modal").hide();
    modalState = 0;
}

$('#modal').click(function(e) {
    e.preventDefault();
    //$('#modal, #alertModalOuter').fadeOut(400, function() {
    //});
});



function increaseEvaluation(offset){
    if(evaluation[offset-1] == 0){
    evaluation[offset-1] =  evaluation[offset-1] + 1;
    } else{
        evaluation[offset-1] =0;
    }
    console.log('offset: ' + offset + ' ' +evaluation[offset-1]);
}

function submitIncident(){
    $('#delButton').hide();
    var optionalText = $('#optionalText').val();
    console.log(evaluation);
    // post
    $.ajax({
        method: "POST",
        url: getAbsoulutUrl() + '/incident',
        data: {
            "_token": getCsrf(),
            'id': id,
            'evaluation': evaluation,
            'optionalText': optionalText
        },
        success: function(data){
            console.log(data);
        },
        error: function(data){
            console.log(data)
        }
    });
}

function deleteIncident(){
    var optionalText = $('#optionalText').val();
    // post
    $.ajax({
        method: "DELETE",
        url: getAbsoulutUrl() + '/incident',
        data: {
            "_token": getCsrf(),
            'id': id
        },
        success: function(data){
            console.log(data);
            location.reload();
        },
        error: function(data){
            console.log(data)
        }
    });
}