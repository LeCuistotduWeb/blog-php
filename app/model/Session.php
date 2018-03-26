<?php

/**
 * session
 */
 class Session{

 	public function __construct(){

 	}

  /**
   * verifier si connecté
   */
  public static function islogged(){
    return isset($_SESSION['auth']);
  }

 	static public function setFlash($message,$type = 'danger'){
 		$_SESSION['flash'] = array(
 			'message' => $message,
 			'type'	  => $type
 		);
 	}

 	public function flash(){
 		if(isset($_SESSION['flash'])){
 			?>
 			<div id="alert" class="alert alert-<?php echo $_SESSION['flash']['type']; ?>">
 				<?php echo $_SESSION['flash']['message']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
 			</div>
 			<?php
 			unset($_SESSION['flash']);
 		}
 	}

 	public function disconnect(){
    session_unset();
    session_destroy();
 	}
 }
