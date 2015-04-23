
<?php
require("../includes/sesionclient.php");
	require("../includes/headerClient.php");
       require ("../calls/callFAQ.php");

    $faq= new callFAQ();


    $todos= $faq->getFaqs();
?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            FAQ
                            <small>preguntas frecuentes</small>
                        </h1>
                      
                    </div>
                </div>
                <!-- /.row -->

                  <?php 


                    $jsontodos= json_decode($todos, true);
                foreach ($jsontodos as $key => $value) {
                    echo '<form action="../put/faq.php" method="POST">';
                    echo '<div class="panel panel-green"><div class="panel-heading">';
                    echo ' <h3 class="panel-title">'.$value['pregunta'].'</h3> </div><div class="panel-body">';
                    echo ''.$value['respuesta'].'<br>';
                    echo '</div> ';
                   
                    
                    
                    echo '<input type="hidden" name="idFAQ" value="'.$value['idFAQ'].'">';

                    echo '<input type="hidden" name="pregunta" value="'.$value['pregunta'].'">';

                    echo '<input type="hidden" name="respuesta" value="'.$value['respuesta'].'">';

                  
                    echo '</form>';

                    echo '</div>';

                }

                    ?>        

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php
require("../includes/footer.php");
?>
