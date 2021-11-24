<?php
session_start();
$title = "Registro";
require_once "./utils/utils.php";
require_once "./utils/Forms/FormElement.php";
require_once "./utils/Forms/PasswordElement.php";
require_once "./utils/Forms/ButtonElement.php";
require_once "./utils/Forms/LabelElement.php";
require_once "./utils/Forms/EmailElement.php";
require_once "./utils/Forms/custom/MyFormControl.php";
require_once "./utils/Validator/NotEmptyValidator.php";
require_once "./utils/Validator/PasswordMatchValidator.php";
require_once "./utils/Validator/MinLengthValidator.php";
require_once "./utils/Validator/MinLowerCaseValidator.php";
require_once "./utils/Validator/MinDigitValidator.php";
require_once "./entity/Usuario.php";
require_once "./database/Connection.php";
require_once "./repository/UsuarioRepository.php";

require_once "./core/App.php";
$info = "";
$config = require_once 'app/config.php';
App::bind('config', $config);
App::bind('connection', Connection::make($config['database']));

$repositorio = new UsuarioRepository();

$nombreUsuario = new InputElement('username', 'text', 'username');
$nombreUsuario->setValidator(new NotEmptyValidator('El nombre de usuari@ no puede estar vacío', true));

$userWrapper = new MyFormControl($nombreUsuario, 'Nombre de usuari@', 'col-xs-12');

$email = new EmailElement('email', 'email');

$emailWrapper = new MyFormControl($email, 'Correo electrónico', 'col-xs-12');

$pv = new NotEmptyValidator('La contraseña no puede estar vacía', true);
$mlv = new MinLengthValidator(6, 'La contraseña debe tener al menos 6 caracteres', false);
$mlcv =  new MinLowerCaseValidator(2, 'La contraseña debe tener al menos 2 letras minúsculas', false);
$mdv =  new MinDigitValidator(2, 'La contraseña debe tener al menos 2 dígitos', false);

$mlcv->setNextValidator($mdv);
$mlv->setNextValidator($mlcv);
$pv->setNextValidator($mlv);

$pass = new PasswordElement('password', 'password');
$pass->setValidator($pv);

$passWrapper = new MyFormControl($pass, 'Contraseña', 'col-xs-12');

$repite = new PasswordElement('repite_password', 'repite_password');
$repite->setValidator(new PasswordMatchValidator($pass, 'Las contraseñas no coinciden', true));

$repiteWrapper = new MyFormControl($repite, 'Repita la contraseña', 'col-xs-12');

$b = new ButtonElement('Registro', '', '', 'pull-right btn btn-lg sr-button');

$form = new FormElement((!empty($hrefReturnToUrl) ? '?returnToUrl=' . $hrefReturnToUrl : ''));
$form
  ->appendChild($userWrapper)
  ->appendChild($emailWrapper)
  ->appendChild($passWrapper)
  ->appendChild($repiteWrapper)
  ->appendChild($b);

  if("POST"===$_SERVER["REQUEST_METHOD"]){
      $form->validate();
      if (!$form->hasError()) {
          try {
              $usuario = new Usuario($nombreUsuario->getValue(),$email->getValue(),$pass->getValue());
              $repositorio->save($usuario);
              $_SESSION['username']=$nombreUsuario->getValue();
              if (isset($_GET['returnToUtl1'])) {
                  header('location: '.$_GET['returnTOUrl1']);
              } else if (isset($_POST['returnToUtl1'])) {
                  header('location: '.$_POST['returnTOUrl1']);
              }{
                  header('location: /');
              }
              
          } catch (QueryException $qe) {
              $excepcion = $qe->getMessage();
              if ((strpos($excepcion,'1062')!==false)) {
                  if ((strpos($excepcion,'username')!==false)) {
                      $form->addError('Ya existe un usario registrado con dicho nombre de usario');
                  }else if ((strpos($excepcion,'email')!==false)) {
                      $form->addError('Ya existe un usario registrado con dicho correo electronico');
                }else{
                    $form->addError($qe->getMessage());
                }
                }else{
                    $form->addError($qe->getMessage());
              }
          } catch (Exception $err){
              $form->addError($err->getMessage());
          }
      }
  }