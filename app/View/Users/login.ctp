<section class="container">
    <h2>Login</h2>
    <div>
        <?php echo $this->Form->create('User', array('role' => 'form')); ?>
        <?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
        <?php echo $this->Form->end(array('label' => 'Entrar', 'formnovalidate', 'class' => 'btn btn-default')); ?>
    </div>
</section>