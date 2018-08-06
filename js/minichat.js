function storeMessage(event, form) {
    event.preventDefault();
    // Requête ajax (serialize pour formater en String l'ensemble des datas des inputs)
    $.post({
        url: $(form).attr('action'),
        data : $(form).serialize(),
        success : function (error) {
            if(error) {
                alert(error);
            }
        }
    })
}
// Insertion du message à l'aide d'une requête préparée
$(window).on("scroll", function () {
    let $window = $(window);
    console.log([
        document.body.scrollHeight,  
        $window.scrollTop(), 
        $window.outerHeight()
    ]);
});

// Affiche les messages toutes les 500ms
setInterval(function () {
    $.get('partials/messages.php', function (htmlMessages) {
        let $window = $(window);
        let scrollIsBottom = document.body.scrollHeight <= $window.scrollTop() + $window.outerHeight();

        $('#messages').html(htmlMessages);

        if (scrollIsBottom) {
            window.scrollTo(0, 9999);
        }
    })
}, 500);

window.scrollTo(0, 9999);