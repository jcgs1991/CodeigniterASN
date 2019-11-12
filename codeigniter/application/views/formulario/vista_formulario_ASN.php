<form method="post" action="<?=site_url('formulario_ASN/nuevo_usuario')?>" role="form">
    <h3>Validaci&oacute;n de registro de usuario con validaci&oacute;n XSS - ASN - jcgs0001@red.ujaen.es - jso00005@red.ujaen.es</h3>
    <div class="form-group">
        <label for="inputUsernameEmail">Introduce tu nombre</label>
        <input type="text" value="<?php echo set_value('user_name'); ?>" name="user_name" >
        <div class="errorMessage"><?php echo form_error('user_name'); ?></div>
    </div>
    <div class="form-group">
        <label for="inputUsernameEmail">Introduce tu email</label>
        <input type="email" name="user_email" value="<?php echo set_value('user_email'); ?>">
        <div class="errorMessage"><?php echo form_error('user_email'); ?></div>
    </div>   
        
    <button type="submit" class="btn btn btn-primary">
        Reg&iacute;strate
    </button>
</form>