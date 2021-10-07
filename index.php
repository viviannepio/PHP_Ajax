<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Registro de usuários</title>
    <link rel="stylesheet" href="Css/estilo.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous">
    </script>
</head>

<body>

    <section id="direita">

        <table>

            <tr id="tabela_usuarios">
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
            
        <?php

        include 'conexao.php';

        $select = "SELECT * FROM USUARIO";
        $result = mysqli_query($connect, $select);

        while ($row = mysqli_fetch_array($result)) 
        {
            $id = $row['ID_USUARIO'];
            $nome = $row['NOME'];
            $email = $row['EMAIL'];
            echo "
                <tr id=\"lista_usuarios_$id\">
                    <td>$id</td>
                    <td>$nome</td>
                    <td>$email</td>
                    <td><a href='javascript:void(0)' class='excluir' id='$row[ID_USUARIO]'>Excluir<td>
                </tr>";
        }

        ?>

        </table>

    </section>

    <section id="esquerda">

        <form id="registro_usuario" method="POST">

            <h2>RESGISTRAR USUÁRIO</h2>

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">

            <label for="email">Email</label>
            <input type="text" name="email" id="email">

            <label for="nome">Senha</label>
            <input type="text" name="senha" id="senha">

            <input type="submit" id="registrar">

        </form>

</body>

</html>

<script type="text/javascript" language="javascript">
    
    $(document).ready(function() 
    {

        $('#registrar').click(function() 
        {

            var dados = $('#registro_usuario').serialize();

            $.ajax(
            {
                type: 'POST',
                dataType: 'json',
                url: 'registrar.php',
                async: true,
                data: dados,
                success: function(response) 
                {
                    location.reload();
                }
            });

            return false;
        });

        jQuery('.excluir').click(function()
        {
            var element = $(this);
            var id = element.attr("id");
            var info = 'id=' +id;

            if(confirm("Deseja realmente excluir esse usuário?"))
            {
                $.ajax(
                    {
                        type: "POST",
                        url: "./excluir.php?id="+id,
                        data: info,
                        success: function() 
                        {
                            setTimeout(function()
                            {
                                window.location.reload(1);
                            })
                        }
                    }
                )
            }
        });
    })
</script>