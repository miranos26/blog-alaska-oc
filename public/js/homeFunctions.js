
// Si admin déjà connecté, affiche un autre bouton vers l'admin
$(document).ready(function() {
    if(sessionStorage.getItem('user')){
        $('#button-login-modal').addClass("d-none");
        $('#button-session-admin').removeClass("d-none");
    }
});

//Get the current year for the copyright
$('#year').text(new Date().getFullYear());

// Testimonials
$('.slider').slick({
    infinite: true,
    slideToShow: 1,
    slideToScroll: 1
});


$('.signaler').submit(function (event){
    event.preventDefault();

    let comment_id = $(this).find('[name="comment_id"]').val();
    let reported = 1;

    $.ajax({
        method : "POST",
        url : 'index.php?p=comments.report',
        data: {
            'reported' : reported,
            'comment_id' : comment_id
        },
    }).fail(function(){
        console.log('comment report failed');
    }).done(function(){

        console.log(comment_id, reported);
        $('.report-comment').addClass("d-none");
    })
});

//Envoie d'un message
$('#contactForm').submit(function(event){
    event.preventDefault();

    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    let name = escapeHtml(($.trim($('#name').val())));
    let email = escapeHtml(($.trim($('#email').val())));
    let message = escapeHtml(($.trim($('#message').val())));

    if( name === '' || email === '' || message === '') {
        $('#field-empty').removeClass("d-none");
        setTimeout(function () {
            $('#field-empty').fadeOut().empty();
        }, 4000);
    } else {
        $.ajax({
            method: "POST",
            url: 'index.php?p=contact.send',
            data: {
                'name': name,
                'email': email,
                'message' : message
            },
        }).fail(function(){
            $('#message-failed').removeClass("d-none");

            setTimeout(function() {
                $("#message-failed").fadeOut().empty();
            }, 4000);

        }).done(function(){
            $('#message-send').removeClass("d-none");

            // on vide le formulaire :
            $('#name').val('');
            $('#email').val('');
            $('#message').val('');

            setTimeout(function() {
                $("#message-send").fadeOut().empty();
            }, 4000);
        })
    }
});

// Souscription Newsletter
//Envoie d'un message
$('#newsletter-form').submit(function(event){
    event.preventDefault();

    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    let newsName = escapeHtml(($.trim($('#newsletter-name').val())));
    let newsEmail = escapeHtml(($.trim($('#newsletter-email').val())));

    if( newsName === '' || newsEmail === '') {
        $('#news-failed').removeClass("d-none");
        setTimeout(function () {
            $('#news-failed').fadeOut().empty();
        }, 4000);
    } else {
        $.ajax({
            method: "POST",
            url: 'index.php?p=contact.suscribe',
            data: {
                'newsName': newsName,
                'newsEmail': newsEmail,
            },
        }).fail(function(){
            $('#news-failed').removeClass("d-none");
            setTimeout(function() {
                $("#news-failed").fadeOut().empty();
            }, 4000);

        }).done(function(){
            $('#news-success').removeClass("d-none");
            // on vide le formulaire :
            $('#newsletter-name').val('');
            $('#newsletter-email').val('');

            setTimeout(function() {
                $("#news-success").fadeOut().empty();
            }, 4000);
        })
    }
});


// Affichage du formulaire dans l'HTML

$('#commentForm').submit( function(event){
    event.preventDefault();

    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    let pseudo = escapeHtml(($.trim($('#pseudo').val())));
    let comment = escapeHtml(($.trim($('#commentMessage').val())));

    if( pseudo === '' || comment === ''){
        $('#comment-failed').removeClass("d-none");
        setTimeout(function() {
            $("#comment-failed").fadeOut().empty();
        }, 4000);
    } else {
        $.ajax({
            method: "POST",
            url: 'index.php?p=comments.add',
            data: {
                'pseudo': pseudo,
                'content': comment,
                'post_id' : $('#post_id').val()
            },
        }).fail(function(){
            $('#comment-failed').removeClass("d-none");
            setTimeout(function() {
                $("#comment-failed").fadeOut().empty();
            }, 4000);
        }).done(function(){
            $('#comment-item').append('<div class="item-com"><h5>' + pseudo + ' </h5> <p> ' + comment + ' </p></div>');
            $('#comment-success').removeClass("d-none");

            // on vide le formulaire :
            $('#pseudo').val('');
            $('#commentMessage').val('');
        });
        setTimeout(function() {
            $("#comment-success").fadeOut().empty();
        }, 4000);
    }
});


// Connexion Admin via Modal
$('#connexion').submit(function(event) {
    event.preventDefault();

    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    let username = escapeHtml(($.trim($('#username').val())));
    let password = escapeHtml(($.trim($('#password').val())));

    if (username === '' || password === '') {
        $('#empty-fields').removeClass("d-none");
        setTimeout(function() {
            $('#empty-fields').addClass("d-none");
        }, 6000);
    } else {
        $.ajax({
            method: "POST",
            url: 'index.php?p=users.login',
            dataType: 'json',
            data: {
                'username': username,
                'password': password
            },
        }).fail(function(){
            $('#empty-fields').removeClass("d-none");
            setTimeout(function() {
                $('#empty-fields').addClass("d-none");
            }, 6000);
        }).done(function(response){
            if(response.success){
                window.location.href = "index.php?p=admin.posts.index";
            } else {
                $('#login-fail').removeClass("d-none");
                setTimeout(function() {
                    $('#login-fail').addClass("d-none");
                }, 4000);
            }
        });
    }
});
