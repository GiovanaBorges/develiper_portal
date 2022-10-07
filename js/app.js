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
                            
                            if (output.status === "sucesso") {
                                $(".alert.alert-success").show();
                                $(".alert.alert-success").html("STATUS: " + output.status + "<br>TOKEN" + output.mensagem);
                                // $(".alert.alert-success").fadeOut();

                                setTimeout(function() {
                                    $(".alert.alert-success").fadeOut();
                                    window.location.reload();
                                }, 3000);
                            } else if (output.status === "erroCat" || output.status === "erro") {
                                $(".alert.alert-danger").show();
                                $(".alert.alert-danger").html("Erro ao Tokenizar");
                                // $(".alert.alert-danger").fadeOut();
                                setTimeout(function() {
                                    $(".alert.alert-danger").fadeOut();
                                }, 3000);
                            }
                        }
                    });
                    return false;
                });
            }
        });
    },

    DeleteTokenizeData: function() {
        $(".table .delete").on('click', function (e){
            e.preventDefault();
            let dataId = $(this).data("id");

            $.ajax({
                url: "deletecustomer.php",
                type: "POST",
                data: { id : dataId },
                dataType: 'json',
                success: function(output) {
                    console.log(output.status);

                    if (output.status === "sucesso") {
                        $(".alert.alert-warning-dell").show();
                        $(".alert.alert-warning-dell").html("STATUS: " + output.status + "<br>Mensagem: " + output.mensagem);
                        // $(".alert.alert-success-dell").fadeOut();
                        
                        console.log(output);
                        setTimeout(function() {
                            $(".alert.alert-warning-dell").fadeOut();
                            window.location.reload();
                        }, 3000);
                    } else if (output.status === "erroCat" || output.status === "erro") {
                        $(".alert.alert-danger-dell").show();
                        $(".alert.alert-danger-dell").html("Erro ao Tokenizar");
                        
                        setTimeout(function() {
                            $(".alert.alert-danger-dell").fadeOut();
                            window.location.reload();
                        }, 3000);
                    }
                }
                
            });
            return false;
        });
    }
}