<link href="css/bootstrap.min.css" rel="stylesheet" />
<!-- Bootstrap responsive -->
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
<!-- Font awesome - iconic font with IE7 support --> 
<link href="css/font-awesome.css" rel="stylesheet" />
<link href="css/font-awesome-ie7.css" rel="stylesheet" />
<!-- Bootbusiness theme -->
<link href="css/boot-business.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/boot-business.js"></script>
<script type="text/javascript">

    $(function() {
        updateGrilla();
    });

    function updateGrilla()
    {
        setTimeout(updateGrilla, 5000);

        $.ajax({
            url: 'cgrilla.php',
            type: 'post',
            data: "tipo=2",
            success: function(data) {
                $("#grilla_contactos2").html(data);
            },
            error: function(e) {
                console.log('Ocurrió un error al actualizar la grilla: ' + e.statusText);
            }
        });
    }
</script>
<div class="span12 center-align">
    <table class="table-hover">
        <tr>
            <td colspan="20" style="vertical-align: top;">
                <div>
                    <div id="grilla_contactos2"></div>
                </div>
            </td>
        </tr>

    </table>   
</div>