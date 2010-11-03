<h1>Contestants</h1>

<ul>
<?php foreach($contestants as $contestant): ?>
  <li><?php echo $contestant->name; ?></li>
<?php endforeach; ?>
</ul>

app:<?php echo sfConfig::get('sf_app'); ?>