<table class="table table-striped container border">
            <thead class="thead-dark border">
                <tr class="border bg-dark text-light">
                    <th scope="col">Code de classe</th>
                    <th scope="col">filiere</th>
                    <th scope="col">Numéro</th>
                    <th scope="col"></th>
                </tr>
                <tr class="border">
                    <form method="post">
                        <th scope="col"><input name="codec" type="text" class="form-control bg-light"></th>
                        <th scope="col"><input name="filiere" type="text" class="form-control bg-light"></th>
                        <th scope="col"><input name="num" type="text" class="form-control bg-light"></th>
                        <th scope="col"><button type="submit" name="env" class="btn"><i class='bx bx-plus-circle text-dark bg-light fs-4' style="    background-color: white;"></i></button></th>
                </tr>
                <!-- <th scope="col"><input name="env" type="submit" value="<i  class='bx bx-plus-circle text-primary fs-4' style="    background-color: white;" ></i>"></th></tr> -->

            <tbody>
                <?php
                foreach (Classe::afficher('classes')->fetchAll() as $key => $value) {
                    echo '
                <tr>
                    <td scope="col">' . $value["codeClasse"] . '</td>
                    <td scope="col">' . $value["filiere"] . '</td>
                    <td scope="col">' . $value["num"] . '</td>
                    <td scope="col"><div class="d-flex" >
                        <button name="editbtn" type="button" class="btn editbtn" data-bs-toggle="modal" data-bs-target="#editmodal">
                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Modifier">
                            <i class="bx bxs-edit text-success fs-5" disabled></i></span>
                        </button>
                        <div class="d-flex justify-content-end" style="padding-left: 21px;">
                        <button name="dlt" type="button" class="btn dlt" data-bs-toggle="modal" data-bs-target="#dltmodal">
                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Supprimer">
                            <i class="bx bxs-trash text-danger fs-5"></i></span>
                        </button>
                        </div>
                        </div>
                    </td>
                </tr>';
                }
                ?>
                </form>
            </tbody>

            <!-- //?Modal Update -->

            <form method="post">
                <div class="modal fade" id="editmodal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">La Modification</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <!-- <input type="hidden" name="codec" codec="codec"> -->
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="mb-3 mt-3">
                                    <label for="nom" class="form-label">Code de classe:</label>
                                    <input type="text"  required class="form-control" id="codec" placeholder="Entrer votre codec" name="codec">
                                </div>
                                <div class="mb-3">
                                    <label for="pwd" class="form-label">Filiére:</label>
                                    <input type="text" required class="form-control" id="filiere" placeholder="Entrer votre filiere" name="filiere">
                                </div>
                                <div class="mb-3">
                                    <label for="pwd" class="form-label">Numéro:</label>
                                    <input type="number" required class="form-control" id="num" placeholder="Entrer votre num" name="num">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="mod" class="btn btn-danger">Modifier</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

            <!-- //? Modal Delete -->

            <div class="modal fade" id="dltmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Supprimer </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>

                        <form action="" method="POST">

                            <div class="modal-body">

                                <input type="hidden" name="code" id="code">

                                <h4>Do you want to Delete this Data</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">NO</button>
                                <button type="submit" name="oui" class="btn btn-danger">OUI</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <?php
            include '../functions/getRows.php';

            if (isset($_POST['env'])) {
                $rows = getRows('classes');
                if (!empty($_POST['codec']) && !empty($_POST['filiere']) && !empty($_POST['num'])) {

                    // $classe1 = new Classe('English',4,'C04');
                    $classe1 = new Classe($_POST['filiere'], $_POST['num'], $_POST['codec']);
                    $arclasse =  array('' . $rows[0] . '' => $classe1->getcodeClasse(), '' . $rows[1] . '' => $classe1->getFiliere(), '' . $rows[2] . '' => $classe1->getNum());
                    $add = $classe1->ajouter('classes', $arclasse);
                    if ($add == true) {
                        echo "<div class='alert alert-success alert-dismissible text-center' role='alert'>
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>

        Les Données est enregistrer!</div>";
                    } elseif ($add == true) {
                        echo "<div class='alert alert-danger alert-dismissible text-center' role='alert'>Error</div>";
                    }
                } else {
                    echo ' <tr><div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Error!</strong> Tous.les champs sonts obligatoire
          </div> </tr>';
                }
            }
            if (isset($_POST['mod'])) {
                $rows = getRows('classes');
                $ar =  array($_POST['codec'],$_POST['filiere'], $_POST['num']);
                // $ar =  array('C01','informatique',4);
                $mod = Classe::modifier('classes', $rows,$ar);
                // classe::modifierclasse($_POST['nom'], $_POST['prenom'], $_POST['age'], $_POST['id']);
                // $arclasse =  array('' . $rows[0] . '' => $_POST['id'], '' . $rows[1] . '' => $_POST['nom'], '' . $rows[2] . '' => $_POST['prenom'], '' . $rows[3] . '' => $_POST['age']);
                // classe::modifier('classes', $arclasse);
            }

            if (isset($_POST['oui'])) {
                $rows = getRows('classes');
                // $dlt = classe::deleteclasse($_POST['dlt_id']);
                $dlt = classe::supprimer('classes',$rows[0],$_POST['code']);
                // $dlt = classe::supprimer('classes',$rows[0],4);
                if ($dlt == true) {
                    echo "<div class='alert alert-success alert-dismissible text-center' role='alert'> <button type='button' class='btn-close reload' data-bs-dismiss='alert'></button>classe est supp!</div>";
                } else {
                    echo "<div class='alert alert-danger alert-dismissible text-center' role='alert'>Error</div>";
                }
            }

            ?> </thead>
        </table>