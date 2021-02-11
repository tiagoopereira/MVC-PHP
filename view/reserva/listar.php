<?php include __DIR__ . '/../inicio-html.php'; ?>
<center>
    <h1>Reservas</h1>
    <a href="/reservar">Adicionar Reserva</a>
    <br/><br/>

    <form method="GET">
        <select name="ano" class="calendario">
            <option selected disabled>Ano</option>

            <?php 
                for ($q = date('Y'); $q >= 2000 ; $q--):
            ?>
                    <option <?= @($_GET['ano'] == $q) ? 'selected': ''; ?>><?= $q; ?></option>
            <?php
                endfor;
            ?>
        </select>

        <select name="mes" class="calendario">
            <option selected disabled>Mês</option>
            <option value="1" <?= @($_GET['mes'] == 1) ? 'selected': ''; ?>>Janeiro</option>
            <option value="2" <?= @($_GET['mes'] == 2) ? 'selected': ''; ?>>Fevereiro</option>
            <option value="3" <?= @($_GET['mes'] == 3) ? 'selected': ''; ?>>Março</option>
            <option value="4" <?= @($_GET['mes'] == 4) ? 'selected': ''; ?>>Abril</option>
            <option value="5" <?= @($_GET['mes'] == 5) ? 'selected': ''; ?>>Maio</option>
            <option value="6" <?= @($_GET['mes'] == 6) ? 'selected': ''; ?>>Junho</option>
            <option value="7" <?= @($_GET['mes'] == 7) ? 'selected': ''; ?>>Julho</option>
            <option value="8" <?= @($_GET['mes'] == 8) ? 'selected': ''; ?>>Agosto</option>
            <option value="9" <?= @($_GET['mes'] == 9) ? 'selected': ''; ?>>Setembro</option>
            <option value="10" <?= @($_GET['mes'] == 10) ? 'selected': ''; ?>>Outubro</option>
            <option value="11" <?= @($_GET['mes'] == 11) ? 'selected': ''; ?>>Novembro</option>
            <option value="12" <?= @($_GET['mes'] == 12) ? 'selected': ''; ?>>Dezembro</option>
        </select>
        
        <input type="submit" name="btn-mostrar" value="Mostrar" id="btn-mostrar"/>
    </form>
    <hr/>

    <?php
        switch($mes){
            case 1:
                echo "<h2>Janeiro de " . $ano . "</h2>";
            break;
            case 2:
                echo "<h2>Fevereiro de " . $ano . "</h2>";
            break;
            case 3:
                echo "<h2>Março de " . $ano . "</h2>";
            break;
            case 4:
                echo "<h2>Abril de " . $ano . "</h2>";
            break;
            case 5:
                echo "<h2>Maio de " . $ano . "</h2>";
            break;
            case 6:
                echo "<h2>Junho de " . $ano . "</h2>";
            break;
            case 7:
                echo "<h2>Julho de " . $ano . "</h2>";
            break;
            case 8:
                echo "<h2>Agosto de " . $ano . "</h2>";
            break;
            case 9:
                echo "<h2>Setembro de " . $ano . "</h2>";
            break;
            case 10:
                echo "<h2>Outubro de " . $ano . "</h2>";
            break;
            case 11:
                echo "<h2>Novembro de " . $ano . "</h2>";
            break;
            case 12:
                echo "<h2>Dezembro de " . $ano . "</h2>";
            break;
        }
    ?>

    <!-- CALENDÁRIO !-->    

    <table border="1"> 
        <tr>
            <th>Dom</th>
            <th>Seg</th>
            <th>Ter</th>
            <th>Qua</th>
            <th>Qui</th>
            <th>Sex</th>
            <th>Sáb</th>
        </tr>
        <?php 
            for($l = 0; $l < $linhas; $l++):
        ?>
                <tr>
        <?php
                for($q = 0; $q < 7; $q++):
                    $w = date('d', strtotime(($q + ($l * 7)) . 'days', strtotime($data_inicio)));
        ?>
                    <td>
                        <?php 
                            echo "<b><font size='4'>" . $w . "</font></b>"; 
                            $w = date('Y-m-d', strtotime(($q + ($l * 7)) . 'days', strtotime($data_inicio)));
                            $w = strtotime($w);

                            foreach($reservas as $reserva) {
                                $dr_inicio = strtotime($reserva->getDataInicio());
                                $dr_fim = strtotime($reserva->getDataFim());
                                $carro = $reserva->getCarro()->getNome();

                                if($w >= $dr_inicio && $w <= $dr_fim) {
                                    echo "<br/><font color='#4c4c4c'>" . $reserva->getNomeReservante() . "</font> <b>(" . $reserva->getCarro()->getNome() . ")</b>";
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
</center>
<?php include __DIR__ . '/../fim-html.php'; ?>