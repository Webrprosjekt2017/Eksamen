<?php
session_start();
require_once('../includes/config.php');
require_once('../includes/ExploreDatabase.php');

if (!isset($_SESSION['logged_in']) or !$_SESSION['logged_in']) {
    header("Location: index.php");
}

if ($_SESSION['success']) {
    echo '<script type="text/javascript">toastr.success("Lokasjon har blitt fjernet!", "")</script>';
    $_SESSION['success'] = false;
}

$db = new ExploreDatabase();
if ($db->getError()) {
    echo('<script type="text/javascript">toastr.error("Kunne ikke koble til tjener","' . $db->getError() . '")</script>');
}
$title = "Fjern sted";
include_once('header.php');

?>

<body>
<div class="fluid-container">
    <div id="testbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 vh-center">
        <div class="panel-body">
            <form action="delete.php" id="remove-location" class="form-horizontal" role="form" method="post">
                <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon">Sted</span>
                    <select class="form-control" name="delete" required>
                        <?php
                        $locations = $db->getAllLocations();
                        foreach ($locations as $location) { ?>
                            <option value="<?= $location['address'] ?>"><?= $location['title'] ?>
                                – <?= $location['address'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div style="margin-top:10px" class="form-group">
                    <div class="col-sm-12 controls">
                        <input type="submit" class="btn btn-danger center-block" value="Fjern fra databasen!"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
