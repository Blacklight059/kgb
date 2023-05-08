<form method="POST">
    
    <?= $form->input('name', 'NOM') ?>
    <?= $form->input('firstname', 'Prénom') ?>    
    <?= $form->input('nom_de_code', 'Titre') ?>

    <button class="btn btn-primary">
        <?php 
        if ($item->getId() !== null) : ?>
            modifier
        <?php else: ?>
            Créer
        <?php endif ?>
    </button>
</form>