<?php

include 'conecta.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Tabela</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
</head>
  <body>
    <div class="container mt-4">
        <h3>Listagem dos Cadastros</h3>
        <hr>
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>.</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data Cadastro</th>
                </tr>
            </thead>
            <tbody>

                <?php

                    $recebendo_cadastros = "SELECT *
                            FROM  cadastros 
                            ";
                    $query_cadastros = mysqli_query($conn, $recebendo_cadastros) or die(mysqli_error($conn));
                    while ($linha = mysqli_fetch_array($query_cadastros)) {

                ?>

                <tr>
                    <td><?php echo $linha['id'] ?></td>
                    <td><?php echo $linha['nome'] ?></td>
                    <td><?php echo $linha['email'] ?></td>
                    <td>
                        <?php 
                        $date = date_create($linha['dataCadastro']);
                        echo date_format($date, "d/m/Y H:i:s");
                        ?>
                    </td>
                    <?php } ?>
                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <th>.</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data Cadastro</th>
                </tr>
            </tfoot>
        </table>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>  
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>  
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>  
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>  

<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
</body>
</html>