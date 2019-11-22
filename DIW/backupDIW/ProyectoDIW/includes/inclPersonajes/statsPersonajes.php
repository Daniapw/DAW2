<?php

function estadisticas($fuerza, $resistencia, $intelecto, $agilidad, $combate, $velocidad){?>
    <div class="container p-0 mt-2">
        <div class="row m-0 text-center border">
            <div class="col-6 col-sm-4 col-lg-2 p-0">
                <div class="chart" id="fuerza" data-percent="<?php echo ($fuerza*10) ?>"><span class="percent"><?php echo $fuerza ?></span></div>
                <h2 class="tituloPuntuacionPer">FUERZA</h2>
            </div>

            <div class="col-6 col-sm-4 col-lg-2 p-0">
                <div class="chart"  id="resistencia" data-percent="<?php echo ($resistencia*10) ?>"><span class="percent"><?php echo $resistencia ?></span></div>
                <h2 class="tituloPuntuacionPer">RESISTENCIA</h2>
            </div>

            <div class="col-6 col-sm-4 col-lg-2 p-0">
                <div class="chart" id="intel"  data-percent="<?php echo ($intelecto*10)  ?>"><span class="percent"><?php echo $intelecto?></span></div>
                <h2 class="tituloPuntuacionPer">INTELECTO</h2>
            </div>

            <div class="col-6 col-sm-4 col-lg-2 p-0">
                <div class="chart" id="agilidad"  data-percent="<?php echo ($agilidad*10) ?>"><span class="percent"><?php echo $agilidad ?></span></div>
                <h2 class="tituloPuntuacionPer">AGILIDAD</h2>
            </div>

            <div class="col-6 col-sm-4 col-lg-2 p-0">
                <div class="chart" id="combate" data-percent="<?php echo ($combate*10) ?>"><span class="percent"><?php echo $combate ?></span></div>
                <h2 class="tituloPuntuacionPer">COMBATE</h2>
            </div>

            <div class="col-6 col-sm-4 col-lg-2 p-0">
                <div class="chart" id="velocidad" data-percent="<?php echo ($velocidad*10) ?>"><span class="percent"><?php echo $velocidad ?></span></div>
                <h2 class="tituloPuntuacionPer">VELOCIDAD</h2>
            </div>

        </div>
    </div>
<?php
};