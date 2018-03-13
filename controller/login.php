<?php

function login() {
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
  if ($confirmUser === false) {
    throw new Exception('identifiant ou mot de passe inconnu');
  }
  else {
    header('Location: index.php?action=backend');
  }
}
