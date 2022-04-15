<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA KORONA_1</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Acsasc <?php echo form_error('acsasc') ?></td><td><input type="text" class="form-control" name="acsasc" id="acsasc" placeholder="Acsasc" value="<?php echo $acsasc; ?>" /></td></tr>
	    <tr><td width='200'>Ascascasc <?php echo form_error('ascascasc') ?></td><td><input type="text" class="form-control" name="ascascasc" id="ascascasc" placeholder="Ascascasc" value="<?php echo $ascascasc; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="asasas" value="<?php echo $asasas; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('korona_1') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>