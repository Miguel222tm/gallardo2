<?php
require("../includes/header.php");
require ("../calls/callFAQ.php");


?>
 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Agregar producto
                            <small>ingrese la siguiente información</small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <?php  if (isset($_POST['btnEditar'])) {
                	# code...
                       
                                 

                ?>
   						<form role="form" action="faq.php" method="POST">
                        <input type="text" name="id" value="<?php echo $_POST['idFAQ']; ?>" readonly>
                            <div class="form-group">
                                <label>Pregunta</label>
                                <input class="form-control" name="pregunta"  value="<?php echo $_POST['pregunta']; ?>"required>
                                
                            </div>
                             <div class="form-group">
                                <label>Respuesta</label>
                                <input class="form-control" name="respuesta" value="<?php echo $_POST['respuesta'];?>" required>
                                
                            </div>
                          
                            

                            <button type="submit" class="btn btn-default" name="btnCambios">Guardar producto</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>


                        <?php
                        }
                        if (isset($_POST['btnBorrar'])) {
                         
                            $borrar= new callFAQ();

                            $borrar->deleteFAQ($_POST['idFAQ']);
                              echo "<script type='text/javascript'> alert('producto borrado con exito'); document.location=('../views/FAQ.php'); </script>";  

                        }


                        if(isset($_POST['btnCambios'])){
                            $edit= new callFAQ();
                            $edit->putFAQ($_POST['id'], $_POST['pregunta'], $_POST['respuesta']);
                                   echo "<script type='text/javascript'> alert('FAQ editado con exito'); document.location=('../views/FAQ.php'); </script>";  



                        }

                        ?>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



<?php


require("../includes/footer.php");
?>


