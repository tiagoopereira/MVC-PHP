<?php include __DIR__ . '/../inicio-html.php'; ?>

<div class="row d-flex align-items-center">
    <div class="col-md-2">
        <h1>Reservas</h1>
    </div>
    <div class="col-md-2">
        <a href="/reservar" class="btn btn-primary btn-sm">Adicionar Reserva</a>
    </div>
</div>

<form method="GET" style="margin-top: 20px;">
    <div class="row d-flex justify-content-center">
        <div class="col-md-2">
            <select class="form-select form-select-md mb-1" name="ano" class="calendario">
                <option selected disabled>Ano</option>

                <?php 
                    for ($q = date('Y'); $q >= 2000; $q--):
                ?>
                        <option <?= $ano == $q ? 'selected': ''; ?>><?= $q; ?></option>
                <?php
                    endfor;
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-select form-select-md mb-1" name="mes" class="calendario">
                <option selected disabled>Mês</option>
                <option value="1" <?= $mes  == 1 ? 'selected': ''; ?>>Janeiro</option>
                <option value="2" <?= $mes == 2 ? 'selected': ''; ?>>Fevereiro</option>
                <option value="3" <?= $mes == 3 ? 'selected': ''; ?>>Março</option>
                <option value="4" <?= $mes == 4 ? 'selected': ''; ?>>Abril</option>
                <option value="5" <?= $mes == 5 ? 'selected': ''; ?>>Maio</option>
                <option value="6" <?= $mes == 6 ? 'selected': ''; ?>>Junho</option>
                <option value="7" <?= $mes == 7 ? 'selected': ''; ?>>Julho</option>
                <option value="8" <?= $mes == 8 ? 'selected': ''; ?>>Agosto</option>
                <option value="9" <?= $mes == 9 ? 'selected': ''; ?>>Setembro</option>
                <option value="10" <?= $mes == 10 ? 'selected': ''; ?>>Outubro</option>
                <option value="11" <?= $mes == 11 ? 'selected': ''; ?>>Novembro</option>
                <option value="12" <?= $mes == 12 ? 'selected': ''; ?>>Dezembro</option>
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary">Visualizar</button>
        </div>
    </div>
</form>

<hr/>

<h2><?= $subtitulo; ?></h2>

<!-- CALENDÁRIO !-->    
<table class="table table-bordered" style="margin-top: 10px;"> 
    <tr class="table-dark">
        <th>Dom</th>
        <th>Seg</th>
        <th>Ter</th>
        <th>Qua</th>
        <th>Qui</th>
        <th>Sex</th>
        <th>Sáb</th>
    </tr>
    <?php 
        for ($l = 0; $l < $linhas; $l++):
    ?>
            <tr>
    <?php
            for ($q = 0; $q < 7; $q++):
                $w = date('d', strtotime(($q + ($l * 7)) . 'days', strtotime($data_inicio)));
    ?>
                <td>
                    <?php 
                        echo "<b><font size='4'>" . $w . "</font></b>"; 
                        $w = date('Y-m-d', strtotime(($q + ($l * 7)) . 'days', strtotime($data_inicio)));
                        $w = strtotime($w);

                        foreach ($reservas as $reserva) {
                            $dr_inicio = strtotime($reserva->getDataInicio());
                            $dr_fim = strtotime($reserva->getDataFim());
                            $carro = $reserva->getCarro()->getNome();

                            if ($w >= $dr_inicio && $w <= $dr_fim) {
                                echo "<br/>" . $reserva->getNomeReservante() . " <strong>(" . $reserva->getCarro()->getNome() . ")</strong>";
                            }
                        }
                    ?>
                </td>
    <?php
            endfor;
    ?>    
            </tr>
    <?php
        endfor;
    ?>
</table>

<?php include __DIR__ . '/../fim-html.php'; ?>