<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<div class="container">

<h1>Mon super blog !</h1>
<p><a href="index.php" class="btn btn-primary">Retour à la liste des billets</a></p>

<div class="news">
    <h3><?= htmlspecialchars($post['title']) ?><em>le <?= $post['creation_date_fr'] ?></em></h3>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
</div>

<h4>Commentaires</h4>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div class="form-group">
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment" class="form-control"></textarea>
    </div>
    <div>
        <input type="submit" class="btn btn-primary"/>
    </div>
</form>

<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']); ?></strong> le <?= $comment['comment_date_fr']; ?> :
      <br> <?= nl2br(htmlspecialchars($comment['comment'])); ?>(<a href="index.php?action=deleteComment&id=<?= $comment['id'] ?>">supprimer</a>) </p>
<?php
}
?>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
