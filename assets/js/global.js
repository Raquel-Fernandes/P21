'use strict';

document.addEventListener('DOMContentLoaded', function (e) {
    $(document).ready(function () { 
        $("#tf-cep").blur(function(){
            var cep = this.value.replace(/[^0-9]/, "");
            if(cep.length != 8){
                return false;
            }
            var url = "https://viacep.com.br/ws/"+cep+"/json/";
            $.getJSON(url, function(dadosRetorno){
                try{
                    // Preenche os campos de acordo com o retorno da pesquisa
                    $("#tf-street").val(dadosRetorno.logradouro);
                    $("#tf-district").val(dadosRetorno.bairro);
                    $("#tf-city").val(dadosRetorno.localidade);
                    $("#tf-state").val(dadosRetorno.uf);
                }catch(ex){}
            });
        });
        $("#tf-cpf").mask('000.000.000-00', {reverse: true});
        $('#tf-phone').mask('(00) 0000-00009');
        $('#tf-birthday').mask('00/00/0000');
        $('#tf-cep').mask('00000-000');
    });
    var baseurl = document.baseURI;
    $('.btn-add-employee').on('click', function() {
        var formData = new FormData();
        var name = $('#tf-name').val();
        var birthday = $('#tf-birthday').val();
        var cpf = $('#tf-cpf').val();
        var rg = $('#tf-rg').val();
        var email = $('#tf-email').val();
        var occupation = $('#tf-occupation').val();
        var phone = $('#tf-phone').val();
        var others_phone = $('#others-phone').val();
        var cep = $('#tf-cep').val();
        var state = $('#tf-state').val();
        var city = $('#tf-city').val();
        var district = $('#tf-district').val();
        var street = $('#tf-street').val();
        var street_number = $('#tf-street-number').val();

        formData.append('name', name);
        formData.append('birthday', birthday);
        formData.append('cpf', cpf);
        formData.append('rg', rg);
        formData.append('email', email);
        formData.append('occupation', occupation);
        formData.append('phone', phone);
        formData.append('others_phone', others_phone);
        formData.append('cep', cep);
        formData.append('state', state);
        formData.append('city', city);
        formData.append('district', district);
        formData.append('street', street);
        formData.append('street_number', street_number);
        formData.append('image', $('input[type=file]')[0].files[0]);
        
        axios({
            method: 'post',
            url: baseurl + 'employees/add_employee',
            data: formData,
            headers: {'Content-Type': 'multipart/form-data' }
        }).then(function (response){
            window.open(baseurl+'employees',"_self")            
        })
    });

    $('.btn-edit-employee').on('click', function() {
        var formData = new FormData();
        var name = $('#tf-name').val();
        var birthday = $('#tf-birthday').val();
        var cpf = $('#tf-cpf').val();
        var rg = $('#tf-rg').val();
        var email = $('#tf-email').val();
        var occupation = $('#tf-occupation').val();
        var phone = $('#tf-phone').val();
        var others_phone = $('#others-phone').val();
        var cep = $('#tf-cep').val();
        var state = $('#tf-state').val();
        var city = $('#tf-city').val();
        var district = $('#tf-district').val();
        var street = $('#tf-street').val();
        var street_number = $('#tf-street-number').val();

        formData.append('name', name);
        formData.append('birthday', birthday);
        formData.append('cpf', cpf);
        formData.append('rg', rg);
        formData.append('email', email);
        formData.append('occupation', occupation);
        formData.append('phone', phone);
        formData.append('cep', cep);
        formData.append('state', state);
        formData.append('city', city);
        formData.append('district', district);
        formData.append('street', street);
        formData.append('street_number', street_number);
        formData.append('image', $('input[type=file]')[0].files[0]);
        var matched = $(".other-phones *");
        var phones_lenght = matched.length / 3;
        var fones = [];
        for (var i = 0; i < phones_lenght; i++) {
            var tmp = $('#tf-phone-'+i).val().trim();
            fones.push(tmp);        
        }
        formData.append('others_phone', JSON.stringify(fones));

        axios({
            method: 'post',
            url: baseurl + 'employees/edit_employee',
            data: formData,
            headers: {'Content-Type': 'multipart/form-data'}
        })
    });
    
    $('.bt-back').on('click', function() {
        window.open(baseurl+'employees',"_self")
    });

    $('.btn-delete-employee').on('click', function() {
        var cpf = this.id;
        console.log(cpf);
        var formData = new FormData();
        formData.append('cpf', cpf);

        axios({
            method: 'post',
            url: baseurl + '/delete_employee',
            data: formData,
            headers: {'Content-Type': 'multipart/form-data'}
        }).then(function (response){
            document.location.reload(true);
        })

    });
    
});