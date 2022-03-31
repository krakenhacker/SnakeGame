$(function () {

    $('#scoreform').on('submit', function (e) {

        e.preventDefault();

        $.ajax({
            type: 'post',
            url: 'score.php',
            data: $('#scoreform').serialize(),
            success: function () {
                alert('form was submitted');
            }
        });

    });

});