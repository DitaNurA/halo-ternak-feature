<?php foreach($layanan as $i => $row) { ?>
<?php if ( $i % 2 === 0 ) { ?>
    <?= view('components/card/layanan/layanan-left', ['data' => $row]); ?>
<?php } else { ?>
    <?= view('components/card/layanan/layanan-right', ['data' => $row]); ?>
<?php }} ?>