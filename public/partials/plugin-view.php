<?php
$usd  = "";
$curr = "USD";
$sym  = "$";
if (isset($atts['eur']) && $atts['eur'] == 1) {
    $curr = "EUR";
    $sym  = "$";
}
$cls  = "text-success ";
$icon = "fa fa-angle-up";
if ($a->{$coin}->{$curr}->CHANGEPCT24HOUR < 0) {
    $cls  = "text-danger ";
    $icon = "fa fa-angle-down";
}

?>
<style>.acss{font-size: 15px !important;font-weight: normal !important;}</style>
<p style='font-size: 3.0em;font-weight: bold;text-align: center;'>
    <?php echo $a->{$coin}->{$curr}->PRICE ?>

</p>
<p style='font-size: 2.5em;font-weight: bold;text-align: center; margin-top: -40px !important;' class='{$cls}'>
    <?php echo $a->{$coin}->{$curr}->CHANGEPCT24HOUR; ?>%
    <span class='{$icon}'></span>
</p>";
<div class='col-md-12' style='text-align:center; font-size: 1.65em;width: 1100px !important;margin-left: -300px;font-weight: bold;'>
    <div class='row'>
        <div class='col-md-3'>
            <?php echo $a->{$coin}->{$curr}->CHANGE24HOUR ?>
            <div class='acss'>24 Hour Change</div>
        </div>
        <div class='col-md-3'><?php echo $a->{$coin}->{$curr}->HIGH24HOUR ?>
            <div class='acss'>24 Hour High</div>
        </div>
        <div class='col-md-3'><?php echo $a->{$coin}->{$curr}->LOW24HOUR ?>
            <div class='acss'>24 Hour Low</div>
        </div>
        <div class='col-md-3'><?php echo $a->{$coin}->{$curr}->MKTCAP ?>
            <div class='acss'>Market Cap</div>
        </div>
    </div>
</div>
