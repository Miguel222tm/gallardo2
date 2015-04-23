
<?php
	require("../includes/header.php");
    require("../calls/callFAQ.php");




function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            FAQ
                            <small>agregar una pregunta</small>
                        </h1>
                      
                    </div>
                </div>
                <!-- /.row  todo -->
                <?php  if (!isset($_POST['pregunta'])) {
                    # code...
                ?>
                        <form role="form" action="agregarFAQ.php" method="POST">

                            <div class="form-group">
                                <label>Pregunta</label>
                                <input class="form-control" name="pregunta" required>
                                
                            </div>
                            <div class="form-group">
                                <label>Respuesta</label>
                                <textarea class="form-control" rows="3" name="respuesta"></textarea>
                            </div>
                             
                            

                            <button type="submit" class="btn btn-default">Guardar producto</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>


                        <?php
                        }else{

                            #codigo agregar a tablas

                            $faq= new callFAQ();
                            $idFAQ= generateRandomString();

                            $faq->postFAQ($idFAQ,$_POST['pregunta'], $_POST['respuesta']);
                                // echo "<script type='text/javascript'> alert('pregunta creada con éxito'); document.location=('agregarFAQ.php'); </script>";  


                            }?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php
require("../includes/footer.php");
?>
