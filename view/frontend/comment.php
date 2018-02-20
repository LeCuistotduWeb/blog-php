<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<div class="container">

<h1>Mon super blog !</h1>
<p><a href="index.php" class="btn btn-primary">Retour à la liste des billets</a></p>

<h4>modifier le commentaire</h4>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div class="form-group">
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" class="form-control" placeholder="<?= $author ?>"/>
    </div>
    <div class="form-group">
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment" class="form-control"></textarea>
    </div>
    <div>
        <input type="submit" class="btn btn-primary"/>
    </div>
</form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
