<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmacia Luz & Vida | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="restrito/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="restrito/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="restrito/dist/css/login.css">

</head>
<!-- CODIGO PHP ----->

<body class="hold-transition login-page">
  <img class="wave" src="restrito/img/wave.png" alt="">
  <div class="conteudo">
    <div class="img">
      <img src="restrito/img/fundo.svg" alt="">
    </div>
    <div class="conteudo-login">
    <form action="restrito/Control/Control_login.php" method="post">
      <img src="restrito/img/simbolo.png" alt="">
      <h2>FARMÁCIA LUZ&VIDA/CATUMBELA</h2>
        <div class="input-div usuario">
               <div class="i">
                  <i class="fas fa-envelope"></i>
               </div>
            <div class="div">
              <h3>usuario/  telefone</h3>
              <input type="text" class="input" name="usuario">
            </div>
        </div>
        <div class="input-div senha">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <h3>senha</h3>
              <input type="password" class="input" name="senha">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </div>
      </form>
      <!-- codigo php da login -->
    </div>
  </div>

<!-- jQuery -->
<script src="restrito/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="restrito/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="restrito/dist/js/adminlte.min.js"></script>
</body>
<script src="restrito/JS/login.js"></script>
</html>