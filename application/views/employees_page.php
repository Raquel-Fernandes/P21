<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h4>Projeto P21</h4>
                <button type="submit" class="editar" id="bt-send-registration">
                    <a href="<?php echo base_url() . 'employees/add'?>">
                        <span role="status" class="spinner-border spinner-border-sm" hidden></span>
                        Adicionar
                    </a>
                </button>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">

                        <thead>
                            <th><input type="checkbox" id="checkall" /></th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Contato</th>
                            <th>Estado</th>
                            <th>Profissão</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </thead>
                        <tbody>
                            <?php foreach ($employees as $value) : ?>

                                <tr>
                                    <td><input type="checkbox" class="checkthis" /></td>
                                    <td><?php echo $value['ds_full_name'] ?></td>
                                    <td><?php echo vsprintf('%s%s%s.%s%s%s.%s%s%s-%s%s', str_split($value['ds_tax_document_cpf'])) ?></td>
                                    <td><?php echo $value['ds_email'] ?></td>
                                    <td><?php echo (strlen($value['ds_phone_number_principal']) === 11) ? vsprintf('(%s%s) %s%s%s%s%s-%s%s%s%s', str_split($value['ds_phone_number_principal'])) : vsprintf('(%s%s) %s%s%s%s-%s%s%s%s', str_split($value['ds_phone_number_principal'])) ?></td>
                                    <td><?php echo $value['ds_state'] ?></td>
                                    <td><?php echo $value['occupation'] ?></td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Edit"><a href="<?php echo base_url() . 'employees/edit/' . $value['ds_tax_document_cpf'] ?>"><button id="<?php echo $value['ds_tax_document_cpf'] ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></p>
                                    </td>
                                    <td>
                                        <input hidden id="cpf-employee-delete" value="<?php echo $value['ds_tax_document_cpf'] ?>">
                                        <p data-placement="top" data-toggle="tooltip" title="Delete"><button id="<?php echo $value['ds_tax_document_cpf'] ?>" class="btn btn-danger btn-xs btn-delete-employee" data-title="Delete"><span class="glyphicon glyphicon-trash"></span></button></p>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

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
    <script src="<?php echo base_url('assets/js/global.js') ?>"></script>

</body>

</html>