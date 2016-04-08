<?php 
defined('C5_EXECUTE') or die('Access Denied.');
Loader::packageElement('_errors', 'backup_pro', array('bp_errors' => $bp_errors, 'backup_meta' => $backup_meta, 'context' => $this, 'view_helper' => $view_helper)); ?>



<?php if( $form_has_errors ): ?>
	<div class="alert alert-danger">Woops! Looks like we have an issue...</div>
<?php endif; ?>  

<?php 
Loader::packageElement('settings/_settings_nav', 'backup_pro', array('active_tab' => $section, 'context' => $this, 'view_helper' => $view_helper));
$form = Core::make('helper/form');
$ui = Loader::helper('concrete/ui');
?>

<br />

<form name="backup_pro_settings" method="POST" action="" class="defaultForm form-horizontal " >
<?php 
$token = Loader::helper('validation/token');
$token->output('bp3_settings_form');
$vars = array(
    'form_errors' => $form_errors, 
    'form_data' => $form_data, 
    'threshold_options' => $threshold_options,
    'form' => $form,
    'ia_cron_commands' => $ia_cron_commands,
    'backup_cron_commands' => $backup_cron_commands,
    'db_tables' => $db_tables,
    'rest_api_route_entry' => $rest_api_route_entry,
    'view_helper' => $view_helper,
    'context' => $this,
    'bp_static_path' => $bp_static_path
);
switch($section)
{
	case 'cron':
	case 'db':
	case 'files':
	case 'license':
	case 'api':
	case 'integrity_agent':
	    Loader::packageElement('settings/_'.$section, 'backup_pro', $vars);
		break;

	default:
	    Loader::packageElement('settings/_general', 'backup_pro', $vars);
		break;
}

?>

        <input type="submit" name="ccm-submit-m62_settings_submit" id="m62_settings_submit" value="<?php echo t($view_helper->m62Lang('update_settings')); ?>" class="btn btn-primary">

</form>