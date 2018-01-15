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
    }, 10000);

});

var modalState = 1;

$(document).click(function(event) {

    if (!modalState == 1) {
        hideModal();
    }
});



function showModal() {
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



function increaseEvaluation(offset){
    evaluation[offset-1] =  evaluation[offset-1] + 1;
    console.log(evaluation[offset-1]);
}

function submitIncident(){
    var optionalText = $('#optionalText').val();
    // post
    $.ajax({
        method: "POST",
        url: getAbsoulutUrl() + '/submit',
        data: {
            "_token": getCsrf(),
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