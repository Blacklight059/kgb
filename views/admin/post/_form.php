<form action="" method="POST">
    <?= $form->input('nom_de_code', 'Titre') ?>
    <?= $form->input('slug', 'URL') ?>
    <?= $form->input('content', 'Contenu') ?>
    <button class="btn btn-primary">
        <?php if ($post->getId() !== null) : ?>
            modifier
        <?php else: ?>
            Créer
        <?php endif ?>²é
    </button>
</form>