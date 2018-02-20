<?php
// Chargement de l'autoloader
require_once 'model/Autoloader.php';

function backend()
{
    require('view/backend/backendView.php');
}

function postedit()
{
    require('view/backend/postEditView.php');
}
