<form method="POST">

    <?= $form->input('slug', 'URL') ?>
    <?= $form->input('title', 'Titre') ?>
    <?= $form->input('content', 'Contenu') ?>
    <?= $form->input('nom_de_code', 'Nom de code') ?>
    <?= $form->select('types_mission', 'type de la mission', $types) ?>
    <?= $form->select('specialite', 'specialite requise pour la mission', $specialites) ?>




    <button class="btn btn-primary">
        <?php if ($item->getId() !== null) : ?>
            modifier
        <?php else: ?>
            Créer
        <?php endif ?>
    </button>
</form>