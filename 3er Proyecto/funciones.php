<?php

require_once '../class/Usuario.php';
$id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;

if($id){
    $usuario = Usuario::buscarPorId($id);


}else { 
    $usuario = new Usuario();

}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = (isset($_POST['email'])) ? $_POST['email'] : null;
    $password = (isset($_POST['password'])) ? $_POST['password'] : null;
    $estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : null;
    $privilegios = (isset($_POST['privilegios'])) ? $_POST['privilegios'] : null;
    $usuario->setEmail($email);
    $usuario->setPassword($password);
    $usuario->setEstatus($estatus);
    $usuario->setPrivilegios($privilegios);
    $usuario->guardar();
    header('Location: index.php');

}else{
    ?> 
    <h1> Guardar Usuario </h1>
    <form method="POST" action="guardar_usuario.php">
    <?php if ($usuario->getId()): ?>
        <input type="hidden" name="id" value="<?php echo $usuario->getId() ?>" />
        <?php endif; ?>
        <label for="email"> Email </label>
        <input type="email" name="email" value="<?php echo $usuario->getEmail() ?>" required />
        <br>
        <label for="password"> Password </label>
        <input type="password" name="password"
        value="<?php echo $usuario->getPassword() ?>" required />
        <br>
        <label> Estatus </label>
        <input type="text" name="estatus" value="<?php if ($usuario->getId()){
            echo $usuario->getEstatus(); }else{ echo '1'; } ?> " required />
        <br>
        <label> Privilegipos </label>
        <input type="text" name="privilegios" value="<?php if ($usuario->getId()){
            echo $usuario->getPrivilegios(); }else{ echo '1'; } ?> " required />
        <br>
        <input type="submit" value="Guardar" />
        <a href="index.php"> Cancelar </a>
        </form>
        <?php

        }

        ?>
