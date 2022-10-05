$(function() {
    controller.init();
});

var controller = {
    init: function() {
        this.AddTokenizeData();
        this.DeleteTokenizeData();
    },

    AddTokenizeData: function() {
        $("#addTokenizeData").validate({
            rules: {
                data: {
                    required: true
                },
                name: {
                    required: true
                },
                template: {
                    required: true
                }
            },
            messages: {
                data: { required: "Obrigatório!" },
                name: { required: "Obrigatório!" },
                template: { required: "Obrigatório!" }
            },
            submitHandler: function(form, e) {
                e.preventDefault();
                var $form = $('.addTokenizeData');
                var $inputs = $form.find("input, select, button, textarea");
                var FormDados = new FormData(document.querySelector(".addTokenizeData"));
                //$inputs.prop("disabled", true);
                $("#submitCustomer").on('click', function() {
                    $.ajax({
                        url: "addcustomer.php",
                        type: "POST",
                        data: FormDados,
                        async: false,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(output) {
                            console.log(output);

                            $inputs.prop("disabled", false);

                            if (output.status === "Succeed") {
                                $(".alert.alert-success").show();
                                $(".alert.alert-success").html("STATUS: " + output.status + "<br>TOKEN" + output.token);
                                setTimeout(function() {
                                    $(".alert.alert-success").fadeOut();
                                    window.location.reload();
                                }, 3000);
                            } else if (output.status === "erroCat" || output.status === "erro") {
                                $(".alert.alert-danger").show();
                                $(".alert.alert-danger").html("Erro ao Tokenizar");
                                setTimeout(function() {
                                    $(".alert.alert-danger").fadeOut();
                                }, 5000);
                            }
                        }
                    });
                    return false;
                });
            }
        });
    },

    DeleteTokenizeData: function() {

    }
}