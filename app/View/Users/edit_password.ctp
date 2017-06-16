<!-- EDIT -->
<section class="container">
    <h2>Modificar Password</h2>
    <?php echo $this->Form->create('User'); ?>
    <?php echo $this->Form->input('tipo', array('type' => 'hidden', 'value' => 'editpass'));?>
    <?php echo $this->Form->input('password', array('id' => 'pw1', 'class' =>'form-control')); ?>
    <?php echo $this->Form->input('password2', array(
            'id' => 'pw2',
            'label' => 'Reescribir Password',
            'class' => 'form-control',
            'type' => 'password',
            'onblur' => 'match_password()')); ?>
    <?php echo $this->Form->end(array(
            'label' => 'Modificar',
            'formnovalidate',
            'class' => 'btn btn-danger btn-block',
            'style' => 'margin:auto;')); ?>
</section>
<!-- SCRIPT -->
<script>
    $(document).ready(function () {

        $('#UserEditPasswordForm').submit(function () {
            return match_password();
        });
    });
</script>