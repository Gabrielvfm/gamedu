<!doctype html>
<html >
<head><?php include 'php/VerificarSession.php'?>

	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Notificações</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="apple-icon.png">
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="../assets/css/normalize.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/themify-icons.css">
  <link rel="stylesheet" href="../assets/scss/style.css">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="green" >

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	 <?php include '../menu.php'?>

    
<!--CONTEUDO AQUI -->
       <div class="row" style="">
    <div class="col-md-10 ">
      <form id="formpush" class="form-horizontal" role="form" method="POST" action="pushAndroid.php" >
        <fieldset>

          <!-- Form Name -->
        
<input type="hidden" name="apiKey" value="AIzaSyDSH5Ca4Qfn9KFNr9xQaSC197gmpy_RNBk"/> <!-- CHAVE API-->
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Disciplina</label>
              <select class="form-control" name="disciplina" id="disciplina">

<option value="">Selecione uma disciplina</option>
<?php     
include '../php/Conexao.php'; 
$stmt = $conexao->prepare("SELECT * FROM disciplina INNER JOIN usuario_disciplina ON (disciplina.iddisciplina = usuario_disciplina.disciplina_iddisciplina) WHERE usuario_idusuario = ?");
$stmt->bindValue(1,$_SESSION['idusuario']);

		


		$stmt->execute();

		if($stmt->rowCount() >0){

	
		

	$resultado = $stmt->fetchAll();

	foreach($resultado as $linha){

echo			'<option value='.$linha["iddisciplina"].'>'.($linha["descricaodisciplina"]).'</option>';	
				

	
	

	
		}
		
		}
		
?>


    
  
</select>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Titulo</label>
              <input  name="title"type="text" placeholder="Titulo" class="form-control">
              <input  id="codigo" name="codigo" type="hidden" placeholder="Titulo" class="form-control">
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Mensagem</label>
              <textarea class="form-control" rows="5" name="message" placeholder="Mensagem"></textarea>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Imagen Url</label>
              <input  name="imagemurl" type="text" placeholder="Imagen Url" class="form-control">
          </div>

            
         <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Link</label>
              <input name="url" type="text" placeholder="Url" class="form-control">
          </div>



<div class="container">
    <br />
  <div class="row">

        <div class="dual-list list-left col-md-5">
            <div class="well text-right">
                <div class="row">
                    <div class="col-md-10">
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-search"></span>
                            <input type="text" name="SearchDualList" class="form-control" placeholder="search" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="btn-group">
                            <a class="btn btn-default selector" title="select all"><i class="glyphicon glyphicon-unchecked"></i></a>
                        </div>
                    </div>
                </div>
                <ul class="list-group" id="listaAlunos">
                   
                </ul>
            </div>
        </div>

        <div class="list-arrows col-md-1 text-center">
            <button type="button" class="btn btn-default btn-sm move-left" value="del" value="del">
                <span class="glyphicon glyphicon-chevron-left" ></span>
            </button>

            <button type="button" class="btn btn-default btn-sm move-right" id="btnadd" value="add">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </button>
        </div>

        <div class="dual-list list-right col-md-5">
            <div class="well">
                <div class="row">
                    <div class="col-md-2">
                        <div class="btn-group">
                            <a class="btn btn-default selector" title="select all"><i class="glyphicon glyphicon-unchecked"></i></a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="input-group">
                            <input type="text" name="SearchDualList" class="form-control" placeholder="search" />
                            <span class="input-group-addon glyphicon glyphicon-search"></span>
                        </div>
                    </div>
                </div>
                <ul  class="list-group" id="listaselecionada">
                    
                </ul>
            </div>
        </div>

  </div>
</div>
</div>




          <div class="form-group">
            <div class="col-sm-offset-1 col-sm-10">
             
                
                <button type="button" id="btnpush" name="btnpush" class="btn btn-primary">ENVIAR NOTIFICAÇÃO</button>
              </div>
            </div>
        

        </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
</div>
   
<!-- -->
    </div>
</div>


</body> 

<script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="../assets/js/plugins.js"></script>
  <script src="../assets/js/main.js"></script>

  <script src="../assets/js/dashboard.js"></script>
  <script src="../assets/js/widgets.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.2/angular.min.js"></script>

</html>
