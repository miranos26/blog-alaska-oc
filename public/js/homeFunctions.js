//Get the current year for the copyright
$('#year').text(new Date().getFullYear());

// Testimonials
$('.slider').slick({
    infinite: true,
    slideToShow: 1,
    slideToScroll: 1
});

$('body').scrollspy({ target: '#main-nav' });

// Add smooth scrolling
$('#main-nav a').on('click', function (e) {
    // Check for a hash value
    if (this.hash !== '') {
        // Prevent default behavior
        e.preventDefault();

        // Store hash
        const hash = this.hash;

        // Animate smooth scroll
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 900, function () {
            // Add hash to URL after scroll
            window.location.hash = hash;
        });
    }
});


$('.signaler').submit(function (event){
    event.preventDefault();

    let comment_id = $(this).find('[name="comment_id"]').val();
    let reported = 1;

    $.ajax({
        method : "post",
        url : '/blog-alaska-oc/public/article/report',
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

    let name = $.trim($('#name').val());
    let email = $.trim($('#email').val());
    let message = $.trim($('#message').val());

    if( name === 'Nom' || name === '' || email === 'Email' || email === '' || message === 'Message' || message === '') {
        $('#field-empty').removeClass("d-none");
        setTimeout(function () {
            $('#field-empty').fadeOut().empty();
        }, 4000);
    } else {
        $.ajax({
            method: 'post',
            url: '/blog-alaska-oc/public/contact',
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


$('#newsletter-form').submit(function(event){
    event.preventDefault();

    let newsName =$.trim($('#newsletter-name').val());
    let newsEmail = $.trim($('#newsletter-email').val());

    if( newsName === 'Nom' || newsEmail === 'Email') {
        $('#news-failed').removeClass("d-none");
        setTimeout(function () {
            $('#news-failed').fadeOut().empty();
        }, 4000);
    } else {
        $.ajax({
            method: "POST",
            url: 'newsletter-suscribe',
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


$('#commentForm').submit( function(event){
    event.preventDefault();

    let pseudo = $.trim($('#pseudo').val());
    let comment =$.trim($('#commentMessage').val());

    if( pseudo === '' || pseudo === 'Pseudo' || comment === '' || comment === 'Message'){
        $('#comment-failed').removeClass("d-none");
        setTimeout(function() {
            $("#comment-failed").fadeOut().empty();
        }, 4000);
    } else {
        $.ajax({
            method: "POST",
            url: '/blog-alaska-oc/public/article/addComment',
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


    let username = $.trim($('#username').val());
    let password = $.trim($('#password').val());

    if (username === '' || password === '') {
        $('#empty-fields').removeClass("d-none");
        setTimeout(function() {
            $('#empty-fields').addClass("d-none");
        }, 6000);
    } else {
        $.ajax({
            method: "POST",
            url: '/blog-alaska-oc/public/login',
            dataType: 'json',
            data: {
                'username': username,
                'password': password,
                captcha: grecaptcha.getResponse()

            },
        }).fail(function(){
            console.log('auth failed');
            $('#empty-fields').removeClass("d-none");
            setTimeout(function() {
                $('#empty-fields').addClass("d-none");
            }, 6000);
        }).done(function(response){
            if(response.success){
                console.log(response);
                window.location.href = "/blog-alaska-oc/public/admin";
            } else {
                $('#login-fail').removeClass("d-none");
                setTimeout(function() {
                    $('#login-fail').addClass("d-none");
                }, 4000);
            }
        });
    }
});
