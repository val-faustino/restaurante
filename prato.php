<?php include 'header.php'; ?>       

        <div class="product-page small-11 large-12 columns no-padding small-centered">
            
            <div class="global-page-container">
                <?php 
                     $cod_prato = $_GET['prato'];
                    $server = 'localhost';
                    $user = 'root';
                    $password = '';
                    $db_name = 'restaurante';
                    $port = '3306';
                    $db_connect = new mysqli($server,$user,$password,
                    $db_name,$port);
                    mysqli_set_charset($db_connect,"utf8");
                    if ($db_connect->connect_error) {
                    echo 'Falha: ' . $db_connect->connect_error;
                    } else {
                        // echo 'Conexão feita com sucesso' . '<br><br>';
                    $sql = "SELECT * FROM pratos where codigo = '$cod_prato'";
                    $result = $db_connect->query($sql);
                    if($result->num_rows >0){
                        while($row =$result->fetch_assoc()){ 
                                     $prato_nome= $row['nome'];
                                     $prato_categoria= $row['categoria']; 
                                     $prato_descricao= $row['descricao']; 
                                     $prato_preco= $row['preco']; 
                                     $prato_caloria= $row['caloria'];         
                                                   
                                                             
                                    }
                                                           
                                }
                              }
                            ?>

              <?php  if( $prato_nome != NULL){ ?>
                <div class="product-section">
                    <div class="product-info small-12 large-5 columns no-padding">
                        <h3><?php echo $prato_nome ;?></h3>
                        <h4><?php echo $prato_categoria; ?></h4>
                        <p><?php echo $prato_descricao; ?></p>
                        <h5><b>Preço: </b>R$ <?php echo $prato_preco ;?></h5>
                        <h5><b>Calorias: </b><?php echo $prato_caloria; ?></h5> 
                    </div>

                    <div class="product-picture small-12 large-7 columns no-padding">
                        <img src="img/cardapio/<?php echo $cod_prato; ?>.jpg" alt="Foto do prato:<?php echo $prato_nome ;?> ">
                    </div>

                </div>

             <?php }else{
                echo 'Prato não encontrado!' . '<br>';
              } ?>   
               

                <div class="go-back small-12 columns no-padding">
                    <a href="cardapio.php"><< Voltar ao Cardápio</a>
                </div>

            </div>
        </div>
                                                                                       <?php include 'footer.php'; ?>                                                                                                                                                      <script src="js/vendor/jquery.js"></script>
        <script src="js/vendor/slick.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/foundation.min.js"></script>
        <script>
            function initMap() {
            var local = {lat: -22.971068, lng: -43.186851};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: local,
                styles: 
                [
                    {
                        "featureType": "administrative",
                        "elementType": "geometry",
                        "stylers": [
                        {
                            "visibility": "off"
                        }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "stylers": [
                        {
                            "visibility": "off"
                        }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "labels.icon",
                        "stylers": [
                        {
                            "visibility": "off"
                        }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "stylers": [
                        {
                            "visibility": "off"
                        }
                        ]
                    }
                ]
                
            });
            var marker = new google.maps.Marker({
                position: local,
                map: map
            });
            }
        </script>
        <script 
            async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlo2Bml6zmqP1_xtT3aLybZdWZNP7l8CM&callback=initMap">
        </script>
        <script>
            $(document).foundation();
        </script>
    </body>

</html>