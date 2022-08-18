 <?php
    use barber\query\ejecuta;
    require("../../vendor/autoload.php");

    $insert =new ejecuta();

    extract($_POST);
$cadena="UPDATE cat_productos SET categoria='$categoria'
 WHERE id_catproducto='$id_catproducto'";


    $insert->ejecutar($cadena);
    echo "<div class='alert alert-success'><h4> EDITADA </h4></div>";
        header("Location:../verCat.php");

?>
