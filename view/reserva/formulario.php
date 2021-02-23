<?php include __DIR__ . '/../inicio-html.php'; ?>

<h1 class="align-self-center">Adicionar Reserva</h1>

<hr/>

<?php 
    if (isset($erro)):
?>
        <div class="alert alert-warning"><?= $erro; ?></div>
<?php
    endif;
?>

<form action="/salvar" method="POST">
    <div class="mb-2 row">
        <label for="carro" class="col-sm-2 col-form-label">Veículo</label>
        <div class="col-sm-10">
            <select class="form-select form-select-md mb-2" id="carro" name="carro">
                <option disabled selected>Selecione...</option>
                <?php
                    foreach ($carros as $carro):
                ?>
                        <option value="<?= $carro->getId(); ?>"><?= $carro->getNome(); ?></option>
                <?php
                    endforeach;
                ?>
            </select>
        </div>
    </div>
    <div class="mb-2 row">
        <label for="data_inicio" class="col-sm-2 col-form-label">Data Inicial</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" id="data_inicio" name="data_inicio" placeholder="dd/mm/yyyy" required/>
        </div>
    </div>
    <div class="mb-2 row">
        <label for="data_fim" class="col-sm-2 col-form-label">Data Final</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" id="data_fim" name="data_fim" placeholder="dd/mm/yyyy" required/>
        </div>
    </div>
    <div class="mb-2 row">
        <label for="nome_reservante" class="col-sm-2 col-form-label">Nome do Reservante</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" id="nome_reservante" name="nome_reservante" placeholder="Your name" required/>
        </div>
    </div>
    <div class="mb-2 row d-flex justify-content-center" style="margin-top: 20px;">
        <div class="col-sm-2">
            <input class="form-control btn btn-primary" type="submit" name="btn-reservar" value="Reservar"/>
        </div>
        <div class="col-sm-2">
            <a href="/home" class="form-control btn btn-outline-danger">Cancelar</a>
        </div>
    </div>
</form>

<?php include __DIR__ . '/../fim-html.php'; ?>