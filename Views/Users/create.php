<?= $this->Form->create('myform') ?>
<?= $this->Form->input('prenom', 'Met ton prenom') ?>
<?= $this->Form->input('password', 'Met ton mot de pass', ['type'=>"password"]) ?>
<?= $this->Form->end('envoyer') ?>