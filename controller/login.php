<?php

function login() {
  $Session = new Session();
  require('view/frontend/loginView.php');
}

function addUser() {
  $userManager = new UserManager();
  $addUser = $userManager->addUser();
  if ($newPost === false) {
      throw new Exception('Impossible d\'ajouter l\'utilisateur');
  }
  else {
      header('Location: index.php?action=backend');
    }
}

function loginVerify($username, $password){
  $userManager = new UserManager();
  $userObj = new User(array(
    'username' => $username,
    'password'  => $password,
  ));
  $confirmUser = $userManager->loginVerify($userObj);
  if ($isPasswordCorrect) {
      session_start();
      $_SESSION['id'] = $resultat['id'];
      $_SESSION['pseudo'] = $pseudo;
      header('Location: index.php?action=backend');
  }
  else {
    echo 'Mauvais identifiant ou mot de passe !';
  }
}
