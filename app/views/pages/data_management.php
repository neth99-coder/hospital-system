<?php require_once APP_ROOT."/views/pages/admin_dashboard.php"?>
<div class="sub-division">
        <div class="data-heading">
            <h1>Data Management</h1>
            <?= implode(' ',explode('_',strtoupper($_GET['record_type'])));?>
        </div>
        <div class="data-search-bar d-flex flex-row justify-content-between">
            <div class="dropdown">
                <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Select the record type..
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="<?=URL_ROOT; ?>/pages/data_management?record_type=vaccinations">Vaccination</a></li>
                    <li><a class="dropdown-item" href="<?=URL_ROOT; ?>/pages/data_management?record_type=antigen_tests">Antigen</a></li>
                    <li><a class="dropdown-item" href="<?=URL_ROOT; ?>/pages/data_management?record_type=covid_deaths">COVID deaths</a></li>
                    <li><a class="dropdown-item" href="<?=URL_ROOT; ?>/pages/data_management?record_type=pcr_tests">PCR tests</a></li>
                </ul>
            </div>
            <form class="data-select-box">
                <div class="row row-cols-auto d-flex justify-content-end">
                    <div class="col"><input class="form-control" id='deo-search-bar' type="text" placeholder="Enter Record ID" required></div>
                </div>
            </form>
        </div>
        <div>
            <?php if(isset($data['type'])):?>
                <table class="data-table table  table-hover table-responsive" id="deo-table">
                    <tbody>
                        <thead>
                            <?php foreach($data['type'] as $column):?>
                                <td><?= $column?></td>
                            <?php endforeach;
                            unset($data['type']);?>
                            <td></td>
                            <td></td>
                        </thead>
                        <?php foreach($data as $record):?>
                            <tr class= "data-table-row">
                                <?php if(gettype($record) != "string"):?>
                                    <?php foreach($record as $key=> $value):?>

                                        <?php if($key === "hospital_id" || $key === "id" || $key === "date"):?>
                                            <?php continue;?>

                                        <?php else:?>  

                                            <td><?= $value?></td>

                                        <?php endif;?>
                                    <?php endforeach;?>
                                
                                    <td  class = "data-edit">
                                        <button class='btn btn-light' data-bs-toggle="modal" data-bs-target="#modalfor<?php echo $data[count($data)-1].$record['id']?>"> 
                                            <i class='data-edit-button bx bxs-edit' style="color: black"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <form action="<?=URL_ROOT; ?>/pages/data_delete?record_type=<?= $data[count($data)-1]?>" method = 'POST'>
                                                <input type="hidden" name="id" value="<?=$record['id']?>">
                                                <input  class="data-delete" type="image" src="<?= URL_ROOT?>/public/images/trash.png" alt="Submit">
                                        </form>
                                    </td>
                                
                            </tr>
                            <!-- Modal -->
                            <?php if($data[count($data)-1] ==='antigen_tests' || $data[count($data)-1] ==='pcr_tests'):?>
                                <div class="modal fade" id="modalfor<?php echo $data[count($data)-1].$record['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form method="post"  action="<?=URL_ROOT;?>/pages/data_management?record_type=<?= $data[count($data)-1]?>">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="Health ID"name="newrecord[health_id]" value="<?=$record['health_id']?>" >
                                                        <label for="floatingInput">Health ID</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Test status" name="newrecord[status]" value="<?=$record['status']?>">
                                                        <label for="floatingPassword">Test Status</label>   
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="newrecord[id]" value="<?=$record['id']?>">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                            <?php if($data[count($data)-1] ==='vaccinations'):?>
                                <div class="modal fade" id="modalfor<?php echo $data[count($data)-1].$record['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form method="post"  action="<?=URL_ROOT;?>/pages/data_management?record_type=<?= $data[count($data)-1]?>">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="Health ID"name="newrecord[health_id]" value="<?=$record['health_id']?>" >
                                                        <label for="floatingInput">Health ID</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Dose" name="newrecord[dose]" value="<?=$record['dose']?>">
                                                        <label for="floatingPassword">Dose</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Name of Vaccine" name="newrecord[vaccine_name]" value="<?=$record['vaccine_name']?>">
                                                        <label for="floatingPassword">Name of Vaccine</label>   
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Conducted Place" name="newrecord[vaccinated_place]" value="<?=$record['vaccinated_place']?>">
                                                        <label for="floatingPassword">Conducted Place</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="textarea" class="form-control" id="floatingPassword" placeholder="Allergies / Disorders" name="newrecord[dissabilities]" value="<?=$record['dissabilities']?>" style="height: 100px">
                                                        <label for="floatingPassword">Allergies / Disorders</label>   
                                                    </div>
                                                    <input type="hidden" name="newrecord[id]" value="<?=$record['id']?>">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                            <?php if($data[count($data)-1] ==='covid_deaths'):?>
                                <div class="modal fade" id="modalfor<?php echo $data[count($data)-1].$record['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form method="post"  action="<?=URL_ROOT;?>/pages/data_management?record_type=<?= $data[count($data)-1]?>">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="Health ID"name="newrecord[health_id]" value="<?=$record['health_id']?>" >
                                                        <label for="floatingInput">Health ID</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Conducted Place" name="newrecord[place]" value="<?=$record['place']?>">
                                                        <label for="floatingPassword">Place</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="textarea" class="form-control" id="floatingPassword" placeholder="Add a comment here..." name="newrecord[comments]" value="<?=$record['comments']?>" style="height: 100px">
                                                        <label for="floatingPassword">Comments</label>   
                                                    </div>
                                                    <input type="hidden" name="newrecord[id]" value="<?=$record['id']?>">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                            <?php endif;?>
                        <?php endforeach;?>
                    </tbody>
                </table>
            <?php endif;?>
        </div>
    </div>
</div>



<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<?php require_once  APP_ROOT."/views/pages/script.php"?>

<?php require_once APP_ROOT."/views/includes/footer.php"?>