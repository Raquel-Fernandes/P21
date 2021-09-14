<!doctype html>

<html>

<head>
    <title>Adicionar</title>
    <base href="<?= base_url() ?>" id="base-url">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/noty@3.2.0-beta/lib/noty.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/noty@3.2.0-beta/lib/themes/bootstrap-v4.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/global.css') ?>">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap.native@2/dist/bootstrap-native-v4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1/dist/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2/dist/parsley.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2/dist/i18n/pt-br.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/compressorjs@1/dist/compressor.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/noty@3.2.0-beta/lib/noty.min.js"></script>


</head>

<body>
    <div class="container">
        <div id="register-login" class="input-fields collapse show animated fadeIn p-3 mb-3 formularios-quadrado">
            <div class="form-group text-center mt-2">
                <h3 class="page-text-color">Adicionar</h3>
            </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="tf-name"> Foto
                        </label>
                        <input type="file" id="img" name="img" accept="image/*">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="tf-name"> Nome Completo
                        </label>
                        <input type="text" class="form-control" name="tf-name" id="tf-name" placeholder="João da Silva" required data-parsley-name>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="tf-name"> Data de nascimento
                        </label>
                        <input type="text" class="form-control" name="tf-birthday" id="tf-birthday" placeholder="11/01/1989" required data-parsley-name>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tf-cpf">CPF</label>
                        <input type="tel" class="form-control" name="tf-cpf" id="tf-cpf" placeholder="000.000.000-00" maxlength="15" required data-parsley-cpf>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tf-manager-code">RG</label>
                        <input type="text" class="form-control" name="tf-rg" id="tf-rg" placeholder="1234567">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tf-email">Email</label>
                        <input type="email" class="form-control" name="tf-email" id="tf-email" placeholder="email@email.com" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tf-phone">Profissão</label>
                        <input type="tel" class="form-control" name="tf-occupation" id="tf-occupation" placeholder="Motorista" required data-parsley-phone>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tf-phone">Telefone <i class="fab fa-whatsapp"></i></label>
                        <input type="tel" class="form-control" name="tf-phone" id="tf-phone" placeholder="(00) 00000-0000" required data-parsley-phone>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-2">
                        <label for="tf-cep">CEP</label>
                        <div class="spinner-border spinner-border-sm float-right" role="status" hidden></div>
                        <input type="tel" class="form-control" name="tf-cep" id="tf-cep" placeholder="00000-000" required>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="tf-state">Estado</label>
                        <input type="text" class="form-control" name="tf-state" id="tf-state" placeholder="DF" minlength="2" maxlength="2" data-parsley-length-message="">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tf-city">Cidade</label>
                        <input type="text" class="form-control" name="tf-city" id="tf-city" placeholder="Brasília" minlength="1" maxlength="61" data-parsley-length-message="">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tf-district">Bairro</label>
                        <input type="text" class="form-control" name="tf-district" id="tf-district" placeholder="Taguatinga" minlength="1" maxlength="75" data-parsley-length-message="" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tf-street">Endereço</label>
                        <input type="text" class="form-control" name="tf-street" id="tf-street" placeholder="QS1" minlength="1" maxlength="66" data-parsley-length-message="" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tf-street-number">Nº</label>
                        <input type="text" class="form-control" name="tf-street-number" id="tf-street-number" placeholder="210" minlength="1" maxlength="32" data-parsley-length-message="" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tf-complement">Complemento</label>
                        <input type="text" class="form-control" name="tf-complement" id="tf-complement" maxlength="32" data-parsley-length-message="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 text-right">
                        <button type="submit" class="voltar bt-back" id="">
                            Voltar
                        </button>
                        <button type="submit" class="editar btn-add-employee" id="btn-add-employee">
                            <span role="status" class="spinner-border spinner-border-sm" hidden></span>
                            Adicionar
                        </button>
                    </div>

                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap.native@2/dist/bootstrap-native-v4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2/dist/parsley.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2/dist/i18n/pt-br.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/noty@3.2.0-beta/lib/noty.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="<?php echo base_url('assets/js/global.js') ?>"></script>

</body>

</html>