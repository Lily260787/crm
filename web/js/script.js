$(function () {
    $verif = 0;
    $('#buttonCompany').click(function () {
        $("#buttonCompany").attr('value', 'Revenir à la liste des sociétés');
        $verif = 1;
    });


    $('#buttonCompany').click(function () {
        if ($verif == 1) {
            $("#buttonCompany").attr('value', 'Créer une nouvelle société');
            $verif = 0;
        }
    });
});


