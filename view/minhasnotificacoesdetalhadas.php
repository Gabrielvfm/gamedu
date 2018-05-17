<!doctype html>
<html >
<head>
<?php include '../php/VerificarSession.php'?>
<?php  
;  
$id = $_GET['id']; 
include '../php/Conexao.php'; 
	$stmt = $conexao->prepare("SELECT n.*,a.nomealuno,n.titulonotificacao,a.urlimagem imagem,a.idaluno, na.visualizada,na.opiniao FROM notificacao n, notificacao_aluno na, aluno a where n.idnotificacao = na.notificacao_idnotificacao AND na.aluno_idaluno = a.idaluno AND na.notificacao_idnotificacao = ? and n.usuario_idusuario=?");
	$stmt->bindValue(1, $id);
  $stmt->bindValue(2, $_SESSION['idusuario']);
	$stmt->execute();

	

	
		

	$resultado = $stmt->fetchAll();

			
?>

	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    <div class="main-panel">
       <?php include '../menusuperior.php';?>

  
   <?php 

foreach($resultado as $linha){?> 

<!--CONTEUDO AQUI -->
<div class="row">
   <div class="col-md-12"><?php echo $linha['titulonotificacao'];?></div>
    <!-- Begin of rows -->
    <div class="row carousel-row">
        <div class="col-md-12 slide-row">
            
              <!-- Indicators -->
              
            
              <!-- Wrapper for slides -->
              <div class="col-md-2">
                <div class="item active">
                    <img src="<?php echo $linha['imagem'];?>" alt="Image" width="80px" height=""80px>
                </div>

                
             <input type="hidden" id="idaluno" name="idaluno" value="<?php echo $linha['idaluno']?>"></input>
            </div>
            <div class="col-md-6">
                <h4><?php echo $linha['nomealuno'];?></h4>
 
                
            </div>
            <div class="col-md-4">
               
                 <p> <?php if($linha['visualizada']>0){echo 'Visualizou : '.$linha['visualizada'];}else{echo 'Não Visualizou';}?>
                 <?php if($linha['visualizada'] > 1){echo 'vezes';}else  if($linha['visualizada']==1){echo 'vez';}?> </p>
                <?php   if($linha['opiniao']==2){  ?>
                <p>
                  <a href="#" class="btn btn-primary btn-sm">
                  <span class="glyphicon glyphicon-thumbs-up"></span> 
                  </a>
               </p> 
               <?php }  ?>
               <?php   if($linha['opiniao']==1){  ?>
                <p>
                  <a href="#" class="btn btn-danger btn-sm">
                  <span class="glyphicon glyphicon-thumbs-down"></span> 
                  </a>
               </p> 
               <?php }  ?>
            </div>
           
            <div class="slide-footer">
                <span class="pull-right buttons">
           
                    <a  href="../php/pushAndroidunico.php?idaluno=<?php echo $linha['idaluno']?>&idnotificacao=<?php echo $linha['idnotificacao']?>" style="border-left-width: 5px;padding-right: 50px;padding-bottom: 20px;" 
                       class="btn btn-sm btn-primary" type="submit"> Reenviar Notificação</a>
                </span>
            </div>
        </div>
    </div>
   
</div>

<?php };?>
</div>



<!-- /.col-lg-12 -->
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
