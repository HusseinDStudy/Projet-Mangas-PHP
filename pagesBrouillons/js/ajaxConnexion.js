/*$(document).ready(function(){
    $("#submit").click(function(e){
        e.preventDefault();
        $.get({
                url: '../service/informationPays.php', //  La ressource ciblée
                data: 'idnomPays=' + $('#nomPays option:selected').text(),
                success: function (data) {
                    $("#resultat").html(data);
                },
                error: function (data) {
                    alert('woops!'); //or whatever
                }

            }
        );
     });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}*/






