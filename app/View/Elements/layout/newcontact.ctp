<?php
// View/Elements/newcontact.ctp

$count = $this->requestAction('/contacts/newContacts');
if ($count && $admin) {
    echo '<i class="unread-contact glyphicon glyphicon-envelope"></i>';
}
?>
